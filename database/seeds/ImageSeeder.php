<?php

use App\Apartment;
use Illuminate\Database\Seeder;
use App\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        factory(Image::class, 10)
            -> make()
            -> each(function($img) {

            $apt = Apartment::inRandomOrder() -> first();
            $img -> apartments() -> associate($apt);

            $img -> save();
    
        });
    }
}
