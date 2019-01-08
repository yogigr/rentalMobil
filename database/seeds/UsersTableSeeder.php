<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'id' => 1,
        	'name' => 'Yogi Gilang Ramadhan',
        	'email' => 'yogigilang182@gmail.com',
        	'password' => bcrypt('secret')
        ]);
    }
}
