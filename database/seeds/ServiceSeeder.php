<?php

use App\Apartment;
use App\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $services = ['wi-fi', 'Swimming pool', 'Free parking', 'SPA', 'H24 Check-In' ];

        foreach ($services as $srv) {

            $apt = Apartment::inRandomOrder() -> take(rand(0,5)) -> get();

            $newRecord = Service::create([
                'name' => $srv
            ]);

            $newRecord -> apartments() -> attach($apt);
        }
        
    }
}
