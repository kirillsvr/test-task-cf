<?php

namespace App\Contracts\Actions;

use Illuminate\Http\JsonResponse;

interface AccountStoreActionContract
{
    public function __invoke(array $request): JsonResponse;
}
