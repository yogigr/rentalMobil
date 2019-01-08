<?php

use Illuminate\Database\Seeder;
use App\AppConfig;

class AppConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppConfig::create([
        	'name' => 'Nirwanatrans App',
        	'env' => 'local',
        	'debug' => true,
        	'url' => 'http://rentcar.test',
        	'timezone' => 'Asia/Jakarta',
        	'locale' => 'id'
        ]);
    }
}
