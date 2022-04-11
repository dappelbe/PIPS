<?php

namespace App\Console\Commands;

use Database\Seeders\TestDatabaseSeeder;
use Illuminate\Console\Command;

class SeedTestDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:SeedTestDatabase';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeds the database with all of the parameters needed to run tests';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $ts = new TestDatabaseSeeder();
        $ts->run();
    }
}
