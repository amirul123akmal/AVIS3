<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Actor;
use App\Models\Address;
use App\Models\Beneficiary;
use App\Models\RequestTransport;
use App\Models\RequestBeneficiary;

class FullUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(170)
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
            $rand = rand(0, 2);
            // 0 = beneficiary registered but hasnt send any document
            if ($rand === 0) {
                $benid = Beneficiary::create([
                    'actorID' => $actor->actorID,
                    'statusID' => '4', // Not Approved
                ]);

                continue ;
                
            }
            // 1 = beneficiary registered but hasnt Approved by project manager
            if ($rand === 1)
            {
                $benid = Beneficiary::create([
                    'actorID' => $actor->actorID,
                    'statusID' => '5',
                ]);
                RequestBeneficiary::create([
                    'benID' => $benid->benID,
                    'numDependents' => rand(4, 9),
                    'incomeDocument' => 'default1.pdf',
                    'supportDocument' => 'default3.pdf',
                    'asnafCardDocument' => 'default2.pdf',
                ]);
                continue ;
            }
            // 2 = beneficiary registered and Approved by project manager
            if ($rand === 2)
            {
                $benid = Beneficiary::create([
                    'actorID' => $actor->actorID,
                    'incomeGroupID' => rand(1, 3),
                    'statusID' => '3', 
                ]);

                RequestBeneficiary::create([
                    'benID' => $benid->benID,
                    'numDependents' => rand(4, 9),
                    'incomeDocument' => 'default1.pdf',
                    'supportDocument' => 'default3.pdf',
                    'asnafCardDocument' => 'default2.pdf',
                ]);
                $rand2 = (bool) rand(0,1);
                // if true, the beneficiary will request a transport
                if ($rand2)
                {
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
                continue ;
            }
        }
    }
}
