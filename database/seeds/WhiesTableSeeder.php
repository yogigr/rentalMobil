<?php

use Illuminate\Database\Seeder;
use App\Why;

class WhiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $whies = [
        	[
        		'order_number' => 1,
        		'icon' => '<i class="fa fa-handshake-o"></i>',
        		'title' => 'Service',
        		'description' => 'Pelanggan adalah bagian terpenting. Pelayanan yang baik kami utamakan untuk memanjakan pelanggan.'
        	],
        	[
        		'order_number' => 2,
        		'icon' => '<i class="fa fa-car"></i>',
        		'title' => 'Quality',
        		'description' => 'Armada kendaraan mobil kami lengkap, selalu dalam kondisi baik dan layak untuk kenyamanan dan keamanan perjalanan pelanggan.'
        	],
        	[
        		'order_number' => 3,
        		'icon' => '<i class="fa fa-headphones"></i>',
        		'title' => 'Support',
        		'description' => 'Dukungan penuh dari Tim yang responsive memenuhi kebutuhan pelanggan sekitar informasi Tempat Wisata, Kuliner dan Hotel.'
        	],
        ];

        foreach ($whies as $why) {
        	Why::create([
        		'order_number' => $why['order_number'],
        		'icon' => $why['icon'],
        		'title' => $why['title'],
        		'description' => $why['description'],
                'user_id' => 1
        	]);
        }
    }
}
