<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class EcommerceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Ecommerce:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'installing our ecommerce project ';

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
        $this->call('storage:link');
        $this->call('migrate:fresh --seed');
        $this->call('db:seed ');
    }
}
