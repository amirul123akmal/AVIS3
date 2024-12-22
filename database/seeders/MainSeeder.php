<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    protected $parameter;

    public function __construct(string $parameter = null)
    {
        $this->parameter = explode(',', $parameter);
        // if (str_contains($parameter, ',')) {
        //     return;
        // }
        // $this->parameter = $parameter ;

    }

    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(StatusSeeder::class);
        if (in_array('DummyUser', $this->parameter)) {
            $this->call(FullUser::class);
        }
    }
}
