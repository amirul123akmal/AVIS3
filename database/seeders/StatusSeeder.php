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
            ['entityType' => 'actorStatus', 'statusType' => 'Enable'],
            ['entityType' => 'actorStatus', 'statusType' => 'Disable'],
            ['entityType' => 'benStatus', 'statusType' => 'Approved'],
            ['entityType' => 'benStatus', 'statusType' => 'Not Approved'],
            ['entityType' => 'benStatus', 'statusType' => 'Pending'],
            ['entityType' => 'vehicleStatus', 'statusType' => 'Available'],
            ['entityType' => 'vehicleStatus', 'statusType' => 'Not Available'],
            ['entityType' => 'vehicleStatus', 'statusType' => 'Maintenance'],
        ]);
    }
}
