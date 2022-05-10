<?php

namespace App\Services\Cloudflare;

use Cloudflare\API\Endpoints\Zones;

class DomainService extends AbstractCloudflare
{
    private Zones $zones;

    public function __construct()
    {
        parent::__construct();

        $this->zones = new Zones($this->adapter);
    }

    public function listDomains(int $page, int $perPage = 20): \stdClass
    {
        return $this->zones->listZones('','', $page, $perPage);
    }
}
