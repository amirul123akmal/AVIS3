<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\State;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = fake('ms_MY');

        $stateID = State::pluck('stateID')->toArray();

        return [
            'road' => $faker->address,
            'postcode' => $faker->postcode,
            'stateID' => $faker->randomElement($stateID)
        ];
    }
}
