<?php

namespace App\Services\Cloudflare;

use Cloudflare\API\Adapter\Guzzle;
use Cloudflare\API\Auth\APIKey;

abstract class AbstractCloudflare
{
    protected Guzzle $adapter;

    public function __construct()
    {
        $this->adapter = new Guzzle(
            new APIKey(
                config('cloudflare.email'),
                config('cloudflare.api_key')
            )
        );
    }
}
