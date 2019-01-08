<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Why;

class WhyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('query')) {
            $whies = Why::where('title', 'like', '%'.request('query').'%')->orWhere('description', 'like', '%'.request('query').'%')
            ->orderBy('order_number', 'asc')->paginate(10)->appends(request()->except('page'));
        } else {
            $whies = Why::orderBy('order_number', 'asc')->paginate(10);
        }

        return view('admin.why.index', compact('whies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.why.create');
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
            'why_order_number' => 'required|numeric|unique:whies,order_number',
            'why_title' => 'required|string|unique:whies,title',
            'why_description' => 'required|string',
            'why_icon' => 'required|string'
        ]);

        $why = Why::create([
            'order_number' => $request->why_order_number,
            'title' => $request->why_title,
            'description' => $request->why_description,
            'icon' => $request->why_icon,
            'user_id' => Auth::id()
        ]);

        return redirect('admin/why')->with('status', 'Berhasil tambah Why');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Why $why)
    {
        return view('admin.why.show', compact('why'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Why $why)
    {
        return view('admin.why.edit', compact('why'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Why $why)
    {
        $this->validate($request, [
            'why_order_number' => 'required|numeric|unique:whies,order_number,'.$why->id,
            'why_title' => 'required|string|unique:whies,title,'.$why->id,
            'why_description' => 'required|string',
            'why_icon' => 'required|string'
        ]);

        $why->order_number = $request->why_order_number;
        $why->title = $request->why_title;
        $why->description = $request->why_description;
        $why->icon = $request->why_icon;
        $why->user_id = Auth::id();
        $why->save();

        return redirect('admin/why/'.$why->id)->with('status', 'Berhasil Update Why');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Why $why)
    {
        $why->delete();
        return redirect('admin/why/')->with('status', 'Berhasil delete Why');
    }
}
