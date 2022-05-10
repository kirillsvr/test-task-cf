<?php

namespace App\Services\Syncing;

use App\Models\Domain;
use App\Services\Cloudflare\DomainService;
use App\Services\ModifyCloudflareData\ClearCloudflareDomains;

class SyncingDomains
{
    private $cloudflareDomains;

    public function __construct(DomainService $service, ClearCloudflareDomains $clearCloudflareDomains)
    {
        $cloudflareDomains = $service->listDomains(1, 1000);

        $this->cloudflareDomains = $clearCloudflareDomains($cloudflareDomains->result);
    }

    public function __invoke()
    {
        Domain::upsert($this->cloudflareDomains, ['id'], ['name', 'status', 'account_id']);
    }
}
