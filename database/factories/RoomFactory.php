<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        return [
            'room_number' => $faker->unique()->numberBetween(100, 999),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
