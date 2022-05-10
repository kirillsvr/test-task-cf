<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SyncingAccounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'syncing:accounts';

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
    public function handle(\App\Services\Syncing\SyncingAccounts $accounts)
    {
        $accounts();

        $this->info('Synchronization was successful.');
    }
}
