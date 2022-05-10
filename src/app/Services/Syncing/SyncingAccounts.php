<?php

namespace App\Services\Syncing;

use App\Models\Account;
use App\Services\Cloudflare\AccountService;
use App\Services\ModifyCloudflareData\ClearCloudflareAccounts;

class SyncingAccounts
{
    private $cloudflareAccounts;

    public function __construct(AccountService $service, ClearCloudflareAccounts $clearCloudflareAccounts)
    {
        $cloudflareAccounts = $service->listAccounts(1, 1000);

        $this->cloudflareAccounts = $clearCloudflareAccounts($cloudflareAccounts->result);
    }

    public function __invoke()
    {
        Account::upsert($this->cloudflareAccounts, ['id'], ['name']);
    }
}
