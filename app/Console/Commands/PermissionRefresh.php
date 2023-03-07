<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class PermissionRefresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh permission for each roles';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('db:seed', [ '--class' => 'PermissionSeeder' ]);

        $this->info('The permissions was successfully refreshed!');
    }
}
