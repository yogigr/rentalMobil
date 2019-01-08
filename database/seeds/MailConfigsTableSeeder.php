<?php

use Illuminate\Database\Seeder;
use App\MailConfig;

class MailConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MailConfig::create([
        	'driver' => 'smtp',
        	'host' => 'smtp.mailtrap.io',
        	'port' => '2525',
        	'from_address' => 'admin@rentcar.test',
        	'from_name' => 'Nirwanatrans Admin',
        	'username' => '8ae202082c7cfa',
        	'password' => 'f2cc40f94f082c'
        ]);
    }
}
