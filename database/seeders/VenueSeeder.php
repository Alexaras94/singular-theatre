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
        $venues = [
            [
                'capacity' => 300,
                'venue_date' => '2023-01-29',
                'venue_time' => '21:00:00',
                'location' => 'Θέατρο Αλάμπρα',
                'free_seats' => 300,
                'status' => 'ACTIVE',
            ], [
                'capacity' => 300,
                'venue_date' => '2023-01-30',
                'venue_time' => '21:00:00',
                'location' => 'Θέατρο Αλάμπρα',
                'free_seats' => 300,
                'status' => 'ACTIVE',
            ], [
                'capacity' => 300,
                'venue_date' => '2023-02-02',
                'venue_time' => '21:00:00',
                'location' => 'Θέατρο Αλάμπρα',
                'free_seats' => 300,
                'status' => 'ACTIVE',
            ],
            [
                'capacity' => 300,
                'venue_date' => '2023-02-05',
                'venue_time' => '21:00:00',
                'location' => 'Θέατρο Αλάμπρα',
                'free_seats' => 300,
                'status' => 'ACTIVE',
            ],
        ];

        foreach ($venues as $key => $value) {
            Venue::create($value);
        }
    }
}
