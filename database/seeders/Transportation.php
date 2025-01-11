<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Transportation extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vehicletype')->insert([
            ['vehicleType' => 'Ambulance'],
            ['vehicleType' => 'Funeral Van'],
            ['vehicleType' => 'Food Truck'],
            ['vehicleType' => 'General Transportation'],
        ]);
    }
}

