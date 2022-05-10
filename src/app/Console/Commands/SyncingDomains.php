<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SyncingDomains extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'syncing:domains';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(\App\Services\Syncing\SyncingDomains $domains)
    {
        $domains();

        $this->info('Synchronization was successful.');
    }
}
