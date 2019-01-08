<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('query')) {
            $users = User::where('name', 'like', '%'.request('query').'%')
            ->orWhere('email', 'like', '%'.request('query').'%')->orderBy('created_at', 'desc')
            ->paginate(10)->appends(request()->except('page'));
        } else {
            $users = User::orderBy('created_at', 'desc')->paginate(10);
        }

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'user_name' => 'required|string',
            'user_email' => 'required|string|unique:users,email',
            'user_password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $request->user_name,
            'email' => $request->user_email,
            'password' => bcrypt($request->user_password)
        ]);

        return redirect('admin/user')->with('status', 'Pengguna baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($user->id == Auth::id()) {
            return redirect('admin/user/'.$user->id)->with('error', 'Operasi gagal. user yg dihapus sedang login');
        }

        $this->validate($request, [
            'user_name' => 'required|string',
            'user_email' => 'required|string|unique:users,email,'.$user->id
        ]);

        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->save();

        return redirect('admin/user/'.$user->id)->with('status', 'Pengguna berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->id == Auth::id()) {
            return redirect('admin/user')->with('error', 'Operasi gagal. user yg dihapus sedang login');
        }

        $user->delete();
        return redirect('admin/user')->with('status', 'Pengguna berhasil dihapus');
    }
}
