<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
    	'nama_perusahaan', 'deskripsi_pendek', 'deskripsi', 'alamat', 'hari_kerja', 'jam_kerja', 'telp1', 'telp2', 'telp3',
    	'email', 'facebook', 'instagram'
    ];
}
