<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VehicleType;
use App\Models\Transportation;

class Transportations extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transportation::insert([
            [
                'vehicleID' => 1, // Assuming 'Ambulance' has ID 1
                'driverID' => null,
                'vehiclePlateNumber' => 'AMB1234',
                'vehicleCapacity' => 2,
                'vehicleDesc' => 'Emergency medical vehicle',
                'vehicleStatus' => 6,
            ],
            [
                'vehicleID' => 2, // Assuming 'Funeral Van' has ID 2
                'driverID' => null,
                'vehiclePlateNumber' => 'FUN5678',
                'vehicleCapacity' => 4,
                'vehicleDesc' => 'Vehicle for funeral services',
                'vehicleStatus' => 6,
            ],
            [
                'vehicleID' => 3, // Assuming 'Food Truck' has ID 3
                'driverID' => null,
                'vehiclePlateNumber' => 'FOO9101',
                'vehicleCapacity' => 5,
                'vehicleDesc' => 'Mobile food service vehicle',
                'vehicleStatus' => 6,
            ],
            [
                'vehicleID' => 4, // Assuming 'General Transportation' has ID 4
                'driverID' => null,
                'vehiclePlateNumber' => 'GEN1122',
                'vehicleCapacity' => 10,
                'vehicleDesc' => 'General purpose transportation vehicle',
                'vehicleStatus' => 6,
            ],
        ]);
    }
}

