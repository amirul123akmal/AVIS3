<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\IncomeGroup;
use App\Models\State;
use App\Models\AccountType;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        State::insert([
            ['stateName' => 'Johor'],
            ['stateName' => 'Kedah'],
            ['stateName' => 'Kelantan'],
            ['stateName' => 'Melaka'],
            ['stateName' => 'Negeri Sembilan'],
            ['stateName' => 'Pahang'],
            ['stateName' => 'Perak'],
            ['stateName' => 'Perlis'],
            ['stateName' => 'Pulau Pinang'],
            ['stateName' => 'Sabah'],
            ['stateName' => 'Sarawak'],
            ['stateName' => 'Selangor'],
            ['stateName' => 'Terengganu'],
            ['stateName' => 'Wilayah Persekutuan Kuala Lumpur'],
            ['stateName' => 'Wilayah Persekutuan Labuan'],
            ['stateName' => 'Wilayah Persekutuan Putrajaya'],
        ]);

        AccountType::insert([
            ['accountType' => 'admin'],
            ['accountType' => 'beneficiaries'],
            ['accountType' => 'volunteers'],
        ]);

        IncomeGroup::insert([
            ['groupType' => 'B40'],
            ['groupType' => 'M40'],
            ['groupType' => 'T20'],
        ]);
    }
}
