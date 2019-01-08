<?php

use Illuminate\Database\Seeder;
use App\How;

class HowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $hows = [
        	[
        		'order_number' => 1,
        		'icon' => '<i class="fa fa-whatsapp fa-3x text-white"></i>',
        		'title' => 'Calon Penyewa menghubungi kami terlebih dahulu',
        		'description' => 'Hubungi kami lewat WhatsApp, Sms, Telpon dengan nomor yang tertera di web Nirwanatrans atau boleh datang langsung ke kantor kami. kami akan cek ketersediaan mobil dan meminta data alamat calon penyewa terlebih dahulu.'
        	],
        	[
        		'order_number' => 2,
        		'icon' => '<i class="fa fa-dollar fa-3x text-white"></i>',
        		'title' => 'Transfer booking fee',
        		'description' => 'Calon Penyewa wajib melakukan Transfer Booking Fee sebesar Rp 100.000'
        	],
        	[
        		'order_number' => 3,
        		'icon' => '<i class="fa fa-male fa-3x text-white"></i>',
        		'title' => 'Tim kami melakukan survey ke tempat tinggal calon penyewa',
        		'description' => 'Kami datang ke tempat / alamat calon penyewa, dan meminta fotokopi KK, KTP, SIM pengemudi, dan jaminan lainnya. Prosedur ini hanya berlaku untuk penyewaan lepas kunci / tanpa supir.'
        	],
        	[
        		'order_number' => 4,
        		'icon' => '<i class="fa fa-car fa-3x text-white"></i>',
        		'title' => 'Serah Terima Mobil / Penjemputan',
        		'description' => 'Serah terima mobil bagi penyewaan lepas kunci, atau penjemputan bagi penyewaan dengan supir, sekaligus pelunasan.'
        	],
        ];

        foreach ($hows as $how) {
        	How::create([
        		'order_number' => $how['order_number'],
        		'icon' => $how['icon'],
        		'title' => $how['title'],
        		'description' => $how['description'],
                'user_id' => 1
        	]);
        }
    }
}
