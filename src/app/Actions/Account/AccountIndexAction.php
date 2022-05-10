<?php

namespace App\Actions\Account;

use App\Actions\Traits\AccountJsonResponseTrait;
use App\Contracts\Actions\AccountActionContract;
use App\Services\Cloudflare\AccountService;
use Illuminate\Http\JsonResponse;

class AccountIndexAction implements AccountActionContract
{
    use AccountJsonResponseTrait;

    private AccountService $service;

    public function __construct(AccountService $service)
    {
        $this->service = $service;
    }

    /**
     * @param array|null $request
     * @return JsonResponse
     */
    public function __invoke(?array $request = []): JsonResponse
    {
        $json = $this->getAccounts($request['page'] ?? 1);

        return $this->createJsonResponse($json);
    }

    /**
     * @param int $page
     * @return \stdClass
     */
    private function getAccounts(int $page): \stdClass
    {
        return $this->service->listAccounts($page);
    }
}
