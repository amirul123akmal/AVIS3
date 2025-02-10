<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Actor;
use App\Models\Address;
use App\Models\Beneficiary;
use App\Models\RequestTransport;

class FullUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(60)
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

        $actors = Actor::where('accountID', 2)->get();

        foreach ($actors as $actor) {
            $randomValue = (bool) rand(0, 1);
            if ($randomValue) {
                $benid = Beneficiary::create([
                    'actorID' => $actor->actorID,
                    'statusID' => '3',
                ]);
                
                RequestTransport::create([
                    'benID' => $benid->benID,
                    'addressFrom' => '123 Main St',
                    'addressTo' => '456 Elm St',
                    'dateReq' => now()->toDateString(),
                    'vehicleID'=> '1',
                    'status' => 'Pending',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
