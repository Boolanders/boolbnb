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
        DB::table('services') -> insert([
            'name' => 'wi-fi'
        ]);
        DB::table('services') -> insert([
            'name' => 'Swimming pool'
        ]);
        DB::table('services') -> insert([
            'name' => 'Free parking'
        ]);
        DB::table('services') -> insert([
            'name' => 'SPA'
        ]);
        DB::table('services') -> insert([
            'name' => 'H24 Check-In'
        ]);
    }
}
