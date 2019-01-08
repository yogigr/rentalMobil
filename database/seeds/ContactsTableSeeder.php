<?php

use Illuminate\Database\Seeder;
use App\Contact;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
        	'nama_perusahaan' => 'Nirwanatrans',
            'deskripsi_pendek' => 'Rental Mobil Bogor',
            'deskripsi' => 'Sewa mobil khusus Matic. Harga mulai dari 400 ribuan per hari',
        	'alamat' => 'Jl. Pelita Jaya 2 No. 36 Kedung Jaya Cimanggu Bogor',
        	'hari_kerja' => 'Senin s/d Sabtu',
        	'jam_kerja' => 'Jam 8.00 s/d 17.00 WIB',
        	'telp1' => '0813 1564 6885',
        	'telp2' => '0813 2000 2056',
        	'telp3' => '0818 100 211'
        ]);
    }
}
