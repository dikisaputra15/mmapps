<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

class Issue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:runissue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'issue added';

    /**
     * Execute the console command.
     */

       public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
         $response = Http::get('https://id.code69.my.id/issue');

        if ($response->successful()) {
            $this->info('Issue accessed successfully.');
        } else {
            $this->error('Failed to access issue.');
        }
    }
}
