<?php

namespace App\Services\Cloudflare;

use Cloudflare\API\Endpoints\Accounts;

class AccountService extends AbstractCloudflare
{
    private Accounts $account;

    public function __construct()
    {
        parent::__construct();

        $this->account = new Accounts($this->adapter);
    }

    public function listAccounts(int $page, int $perPage = 20): \stdClass
    {
        return $this->account->listAccounts($page, $perPage);
    }

    public function addAccount(string $name): \stdClass
    {
        return $this->account->addAccount($name);
    }
}
