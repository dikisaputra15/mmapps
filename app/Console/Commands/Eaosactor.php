<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

class Eaosactor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:runeaosactor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'EAOS actor added';

     public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
         $response = Http::get('https://mm.code69.my.id/eaosactor');

        if ($response->successful()) {
            $this->info('EAOS actor accessed successfully.');
        } else {
            $this->error('Failed to access EAOS actor.');
        }
    }
}
