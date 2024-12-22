<?php

namespace App\Console\Commands;

use Database\Seeders\MainSeeder;
use Illuminate\Console\Command;

class MainSeederCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:MainSeeder {param?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $param = $this->argument('param') ?? '';
        $seeder = new MainSeeder($param);
        $seeder->run();
    }
}
