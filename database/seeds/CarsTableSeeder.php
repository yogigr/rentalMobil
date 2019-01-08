<?php

use Illuminate\Database\Seeder;
use App\Car;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$cars = [
    		[
    			'name' => 'Toyota Fortuner VRZ',
    			'price' => 400000,
    			'image' => 'toyota-fortuner-vrz.jpg'
    		],

    		[
    			'name' => 'Toyota Calya',
    			'price' => 400000,
    			'image' => 'toyota-calya.jpg'
    		],

    		[
    			'name' => 'Honda Mobilio',
    			'price' => 400000,
    			'image' => 'honda-mobilio.jpg'
    		],

            [
                'name' => 'Honda Brio',
                'price' => 400000,
                'image' => 'honda-brio.jpg'
            ],

            [
                'name' => 'Honda City',
                'price' => 400000,
                'image' => 'honda-city.jpg'
            ],
    	];

    	foreach ($cars as $car) {
    		Car::create([
    			'name' => $car['name'],
    			'price' => $car['price'],
    			'image' => $car['image'],
    			'user_id' => 1
    		]);
    	}
    }
}
