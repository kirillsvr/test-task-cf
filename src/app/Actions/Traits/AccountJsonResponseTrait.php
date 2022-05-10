<?php

namespace App\Actions\Traits;

use App\Http\Resources\Cloudflare\AccountsCollection;
use Illuminate\Http\JsonResponse;

trait AccountJsonResponseTrait
{
    /**
     * @param \stdClass $json
     * @return JsonResponse
     */
    private function createJsonResponse(\stdClass $json): JsonResponse
    {
        return response()->json([
            'data' => new AccountsCollection($json->result),
            'meta' => $json->result_info,
        ]);
    }
}
