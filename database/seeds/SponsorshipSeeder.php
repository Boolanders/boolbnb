<?php

use App\Apartment;
use App\Sponsorship;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        factory(Sponsorship::class, 3)
        -> create()
        -> each(function($spr) {
            
            $apt = Apartment::inRandomOrder()
                -> take(rand(1, 10))
                -> get();
            $spr -> apartments() -> attach($apt);
        });
    }
}
