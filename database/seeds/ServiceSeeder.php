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
        factory(Service::class, 5)
        -> create()
        -> each(function($srv) {
            
            $apt = Apartment::inRandomOrder()
                -> take(rand(1, 10))
                -> get();
            $srv -> apartments() -> attach($apt);
        });
    }
}
