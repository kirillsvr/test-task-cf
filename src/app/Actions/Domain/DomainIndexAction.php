<?php

namespace App\Actions\Domain;

use App\Contracts\Actions\DomainActionContract;
use App\Http\Resources\Cloudflare\DomainsCollection;
use App\Services\Cloudflare\DomainService;
use Illuminate\Http\JsonResponse;

class DomainIndexAction implements DomainActionContract
{
    private DomainService $service;

    public function __construct(DomainService $service)
    {
        $this->service = $service;
    }
    /**
     * @param array|null $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(?array $request = []): JsonResponse
    {
        $json = $this->getDomains($request['page'] ?? 1);

        return $this->createJsonResponse($json);
    }

    /**
     * @param int $page
     * @return \stdClass
     */
    private function getDomains(int $page): \stdClass
    {
        return $this->service->listDomains($page);
    }

    /**
     * @param \stdClass $json
     * @return JsonResponse
     */
    private function createJsonResponse(\stdClass $json): JsonResponse
    {
        return response()->json([
            'data' => new DomainsCollection($json->result),
            'meta' => $json->result_info,
        ]);
    }
}
