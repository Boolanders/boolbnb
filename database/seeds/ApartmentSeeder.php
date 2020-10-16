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
                $srv = Service::inRandomOrder() -> take(rand(0, 5)) -> get();
                $spr = Sponsorship::inRandomOrder() -> take(rand(0,5)) -> get();          
                $usr = User::inRandomOrder() -> first();
                $apt -> user() -> associate($usr);


                $apt -> save();
                $apt -> services() -> attach($srv);
                $apt -> sponsorships() -> attach($spr, ['start_date' => '2020-10-10', 'end_date' => '2020-10-10']);
    
        });


    }
}
