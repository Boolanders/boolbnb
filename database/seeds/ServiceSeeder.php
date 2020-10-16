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
        DB::table('Services') -> insert([
            'name' => 'wi-fi'
        ]);
        DB::table('Services') -> insert([
            'name' => 'Swimming pool'
        ]);
        DB::table('Services') -> insert([
            'name' => 'Free parking'
        ]);
        DB::table('Services') -> insert([
            'name' => 'SPA'
        ]);
        DB::table('Services') -> insert([
            'name' => 'H24 Check-In'
        ]);
    }
}
