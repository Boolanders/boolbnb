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

        $sprData = [
            [
                'price' => '2.99',
                'hours' => '24',
            ],
            [
                'price' => '5.99',
                'hours' => '48',
            ],
            [
                'price' => '9.99',
                'hours' => '144',
            ]
        ];

        foreach ($sprData as $spr) {
            
            Sponsorship::create($spr);
                     
        }

      
    }
}
