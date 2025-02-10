<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status')->insert([
            ['entityType' => 'actorStatus', 'statusType' => 'Enable'],  // 1
            ['entityType' => 'actorStatus', 'statusType' => 'Disable'], // 2
            ['entityType' => 'benStatus', 'statusType' => 'Approved'],  // 3
            ['entityType' => 'benStatus', 'statusType' => 'Not Approved'],  // 4 
            ['entityType' => 'benStatus', 'statusType' => 'Pending'],   // 5
            ['entityType' => 'vehicleStatus', 'statusType' => 'Available'], // 6
            ['entityType' => 'vehicleStatus', 'statusType' => 'Not Available'], // 7
            ['entityType' => 'vehicleStatus', 'statusType' => 'Maintenance'],   // 8
        ]);
    }
}
