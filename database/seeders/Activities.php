<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Activity;

class Activities extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            \App\Models\Activity::create([
                'activityName' => $faker->sentence(3),
                'activityPlace' => $faker->city,
                'dateStart' => now()->setDate(2025, 2, rand(7, 15)),
                'dateEnd' => now()->setDate(2025, 2, rand(15, 30)),
                'timeStart' => $faker->time(),
                'timeEnd' => $faker->time(),
                'volunteerCount' => $faker->numberBetween(1, 100),
                'beneficiaryCount' => $faker->numberBetween(1, 100),
                'activityImage' => 'activity_images/default.jpg',
                'activityDescription' => $faker->paragraph,
                'created_at' => now()->setDate(2025, 2, rand(1, 6))->setTime(rand(0, 23), rand(0, 59)),
                'updated_at' => now(),
            ]);
        }
    }
}
