<?php

namespace Database\Seeders;

use App\Models\Venue;
use Database\Factories\VenuesFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Venue::factory()
        ->count(5)
        ->create();

        //
    }
}
