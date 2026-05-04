<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

class Intelactor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:runintelactor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Intel actor added';

     public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://mm.code69.my.id/intelactor');

        if ($response->successful()) {
            $this->info('Intel actor accessed successfully.');
        } else {
            $this->error('Failed to access Intel actor.');
        }
    }
}
