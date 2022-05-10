<?php

namespace App\Actions\Account;

use App\Actions\Traits\AccountJsonResponseTrait;
use App\Contracts\Actions\AccountStoreActionContract;
use App\Services\Cloudflare\AccountService;
use Illuminate\Http\JsonResponse;

class AccountStoreAction implements AccountStoreActionContract
{
    use AccountJsonResponseTrait;

    private AccountService $service;

    public function __construct(AccountService $service)
    {
        $this->service = $service;
    }

    /**
     * @param array $request
     * @return JsonResponse
     */
    public function __invoke(array $request): JsonResponse
    {
        $json = $this->addAccount($request['name']);

        return $this->createJsonResponse($json);
    }

    /**
     * @param string $name
     * @return \stdClass
     */
    private function addAccount(string $name): \stdClass
    {
        return $this->service->addAccount($name);
    }
}
