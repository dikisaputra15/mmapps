<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

class Actorgender extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:runactorgender';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actor gender added';

    /**
     * Execute the console command.
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $response = Http::get('https://mm.code69.my.id/actorgender');

        if ($response->successful()) {
            $this->info('Actor gender accessed successfully.');
        } else {
            $this->error('Failed to access Actor gender.');
        }
    }
}
