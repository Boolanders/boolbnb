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

       DB::table('sponsorships') -> insert([
            'price' => '2.99',
            'hours' => '24',
       ]);
       DB::table('sponsorships') -> insert([
        'price' => '5.99',
        'hours' => '48',
       ]);
       DB::table('sponsorships') -> insert([
        'price' => '9.99',
        'hours' => '144',
       ]);
    }
}
