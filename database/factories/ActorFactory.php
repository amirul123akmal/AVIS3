<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Actor>
 */
class ActorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'actorID' => null,
            'fullname' => fake()->name(),
            'ic' => fake()->numerify('############'),
            'phoneNumber' => fake()->phoneNumber(),
            'addressID' => null,
            'accountID' => random_int(2, 3),
        ];
    }
}
