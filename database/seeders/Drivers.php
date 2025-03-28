<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Driver;

class Drivers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Driver::insert([
            ['driverName' => 'Ashik Uiteru', 'driverPhoneNum' => '1234567890'],
            ['driverName' => 'Romanwa Kulu', 'driverPhoneNum' => '0987654321'],
            ['driverName' => 'Sung Jin Woo', 'driverPhoneNum' => '5551234567'],
            ['driverName' => 'Sun Ill Hwan', 'driverPhoneNum' => '5559876543'],
        ]);
    }
}
