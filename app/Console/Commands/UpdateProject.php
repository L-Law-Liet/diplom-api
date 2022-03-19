<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class UpdateProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for update project';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('voyager:install');
        Artisan::call('optimize');
        Artisan::call('migrate:fresh --seed');
        Artisan::call('storage:link');
        Artisan::call('queue:work');
        return 0;
    }
}
