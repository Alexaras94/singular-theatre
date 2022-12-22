<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VenuesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            //'id' => fake()->unique()->id(),
            'title' => fake()->title(),
            'capacity' => fake()->capacity(),
            'venue_date'=>fake()->venue_date(),
            'venue_time'=>fake()->venue_time(),
            'location'=>fake()->location(),
            'status'=>fake()->location()
];

    }
}
