<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\How;

class HowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('query')) {
            $hows = How::where('title', 'like', '%'.request('query').'%')->orWhere('description', 'like', '%'.request('query').'%')
            ->orderBy('order_number', 'asc')->paginate(10)->appends(request()->except('page'));
        } else {
            $hows = How::orderBy('order_number', 'asc')->paginate(10);
        }

        return view('admin.how.index', compact('hows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.how.create');
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
            'how_order_number' => 'required|numeric|unique:hows,order_number',
            'how_title' => 'required|string|unique:hows,title',
            'how_description' => 'required|string',
            'how_icon' => 'required|string'
        ]);

        $how = How::create([
            'order_number' => $request->how_order_number,
            'title' => $request->how_title,
            'description' => $request->how_description,
            'icon' => $request->how_icon,
            'user_id' => Auth::id()
        ]);

        return redirect('admin/how')->with('status', 'Berhasil tambah How');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(How $how)
    {
        return view('admin.how.show', compact('how'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(How $how)
    {
        return view('admin.how.edit', compact('how'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, How $how)
    {
        $this->validate($request, [
            'how_order_number' => 'required|numeric|unique:hows,order_number,'.$how->id,
            'how_title' => 'required|string|unique:hows,title,'.$how->id,
            'how_description' => 'required|string',
            'how_icon' => 'required|string'
        ]);

        $how->order_number = $request->how_order_number;
        $how->title = $request->how_title;
        $how->description = $request->how_description;
        $how->icon = $request->how_icon;
        $how->user_id = Auth::id();
        $how->save();

        return redirect('admin/how/'.$how->id)->with('status', 'Berhasil Update How');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(How $how)
    {
        $how->delete();
        return redirect('admin/how')->with('status', 'Berhasil delete How');
    }
}
