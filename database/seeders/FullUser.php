<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Actor;
use App\Models\Address;

class FullUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(20)
            ->has(
                Actor::factory()->state(function (array $attributes, User $user) {
                    $address = Address::factory()->create();

                    return [
                        'actorID' => $user->loginID,
                        'addressID' => $address->addressID
                    ];

                })
            )
            ->create();
    }
}
