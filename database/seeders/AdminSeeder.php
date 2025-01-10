<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id = DB::table('login')->insertGetId([
            'username' => "Super Admin",
            'email' => 'amirul@gmail.com',
            'password' => Hash::make('adminpassword'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $addID = DB::table('address')->insertGetId([
            'road' => 'abc defgh ijklm opqr stuvwxyz',
            'postcode' => '40000',
            'stateID' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('actor')->insertGetId([
            'actorID' => $id,
            'fullname' => 'Amirul Akmal Khairul Izwan',
            'ic' => '111111111111',
            'phoneNumber' => '22222222222',
            'addressID' => $addID,
            'accountID' => 1,
            'statusID' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
