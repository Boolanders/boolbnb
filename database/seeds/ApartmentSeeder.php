<?php

use App\User;
use App\Apartment;
use App\Service;
use App\Sponsorship;
use Illuminate\Database\Seeder;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        factory(Apartment::class, 10)
            -> make()
            -> each(function($apt) {
                
                $faker = \Faker\Factory::create();

                $usr = User::inRandomOrder() -> first();
                $apt -> user() -> associate($usr);
                $sponsorships = Sponsorship::inRandomOrder() -> take(rand(0,3)) -> get();

                $apt -> save();
                
                foreach ($sponsorships as $spr) {

                    $apt -> sponsorships()
                            -> attach($spr,[
                                'start_date' => $faker -> dateTimeBetween($startDate = '-15 days', $endDate = '+15 days', $timezone = null),
                                'end_date'   => $faker -> dateTimeBetween($startDate = '-15 days', $endDate = '+15 days', $timezone = null),
                            ]);
                }

               
    
        });


    }
}
