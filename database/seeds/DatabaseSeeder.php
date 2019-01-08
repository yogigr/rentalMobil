<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CarsTableSeeder::class);
        $this->call(WhiesTableSeeder::class);
        $this->call(HowsTableSeeder::class);
        $this->call(ContactsTableSeeder::class);

        //config
        $this->call(AppConfigsTableSeeder::class);
        $this->call(MailConfigsTableSeeder::class);
    }
}
