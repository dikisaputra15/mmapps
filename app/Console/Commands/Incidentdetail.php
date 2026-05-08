<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

class Incidentdetail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:runincidentdetail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'incident detail added';

    /**
     * Execute the console command.
     */

     public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
         $response = Http::get('https://mm.code69.my.id/incidentdetail');

        if ($response->successful()) {
            $this->info('Incident detail accessed successfully.');
        } else {
            $this->error('Failed to access incident detail.');
        }
    }
}
