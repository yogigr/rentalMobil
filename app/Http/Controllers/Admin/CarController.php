<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Traits\FileUploader;
use App\Car;
use Image;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('query')) {
            $cars = Car::where('name', 'like', '%'.request('query').'%')->orderBy('created_at', 'desc')
            ->paginate(10)->appends(request()->except('page'));
        } else {
            $cars = Car::orderBy('created_at', 'desc')->paginate(10);
        }

        return view('admin.car.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.car.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'car_name' => 'required|string|unique:cars,name',
            'car_description' => 'string',
            'car_price' => 'required|numeric',
            'car_image' => 'required|image|mimes:jpeg,jpg|max:200',
        ]);

        $car = Car::create([
            'name' => $request->car_name,
            'description' => $request->car_description,
            'price' => $request->car_price,
            'user_id' => Auth::id()
        ]);

        if ($request->hasFile('car_image')) {
            $filename = $this->uploadImage($request, $car->name, 'car_image', 'images/cars/');

            $car->image = $filename;
            $car->save();
        }

        return redirect('admin/car')->with('status', 'Paket Mobil berhasil ditambahkan');
    }

    /**
     * Show the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('admin.car.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('admin.car.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $this->validate($request, [
            'car_name' => 'required|string|unique:cars,name,'.$car->id,
            'car_description' => 'string',
            'car_price' => 'required|numeric',
            'car_image' => 'image|mimes:jpeg,jpg|max:200',
        ]);

        
        $car->name = $request->car_name;
        $car->description = $request->car_description;
        $car->price = $request->car_price;
        $car->user_id = Auth::id();
        $car->save();
      
        if ($request->hasFile('car_image')) {
            if (file_exists(public_path('images/cars/'.$car->image))) {
                File::delete(public_path('images/cars/'.$car->image));
            }
            $filename = $this->uploadImage($request, $car->name, 'car_image', 'images/cars/');

            $car->image = $filename;
            $car->save();
        }

        return redirect('admin/car/'.$car->id)->with('status', 'Paket Mobil berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        if (file_exists(public_path('images/cars/'.$car->image))) {
            File::delete(public_path('images/cars/'.$car->image));
        }

        $car->delete();
        
        return redirect('admin/car')->with('status', 'Berhasil hapus paket mobil');
    }

    private function uploadImage(Request $request, string $subjectName, string $requestName, string $directoryName)
    {
        $filename = str_slug($subjectName) . '.' . $request->file($requestName)->getClientOriginalExtension();
        $image = Image::make($request->file($requestName)->getRealpath());
        $height = $image->height();
        $width = $image->width();
        if ($height < $width) {
            $image->crop($height, $height);

        } elseif ($height > $width) {
            $image->crop($width, $width);
        }

        $image->save(public_path($directoryName).$filename);
        return $filename;
    }

}
