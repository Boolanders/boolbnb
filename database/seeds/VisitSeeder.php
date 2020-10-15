<?php

use Illuminate\Database\Seeder;
use App\Visit;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        factory(Visit::class, 100) -> create();
    }
}
