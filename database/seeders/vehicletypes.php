<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VehicleType;

class vehicletypes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VehicleType::insert([
            ['vehicleType' => 'Ambulance'],
            ['vehicleType' => 'Funeral Van'],
            ['vehicleType' => 'Food Truck'],
            ['vehicleType' => 'General Transportation'],
        ]);
    }
}
