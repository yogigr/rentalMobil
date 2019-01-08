<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contact;

class ContactController extends Controller
{
    public function index()
    {
    	$contact = Contact::firstOrFail();
    	return view('admin.contact.index', compact('contact'));
    }

    public function update(Request $request)
    {
    	$contact = Contact::firstOrFail();

    	$this->validate($request, [
    		'nama_perusahaan' => 'required|string',
            'deskripsi_pendek' => 'required|string',
    		'deskripsi' => 'required|string',
    		'alamat' => 'required|string',
    		'hari_kerja' => 'required|string',
    		'jam_kerja' => 'required|string',
    		'telp1' => 'required|string',
    		'telp2' => 'required|string',
    		'telp3' => 'required|string',
    		'email' => 'required|email',
    		'facebook' => 'required|url',
    		'instagram' => 'required|url'
    	]);

    	$contact->nama_perusahaan = $request->nama_perusahaan;
        $contact->deskripsi_pendek = $request->deskripsi_pendek;
    	$contact->deskripsi = $request->deskripsi;
    	$contact->alamat = $request->alamat;
    	$contact->hari_kerja = $request->hari_kerja;
    	$contact->jam_kerja = $request->jam_kerja;
    	$contact->telp1 = $request->telp1;
    	$contact->telp2 = $request->telp2;
    	$contact->telp3 = $request->telp3;
    	$contact->email = $request->email;
    	$contact->facebook = $request->facebook;
    	$contact->instagram = $request->instagram;
    	$contact->save();

    	return redirect('admin/contact')->with('status', 'Berhasil update kontak');
    }
}
