<?php

namespace App\Contracts\Actions;

use Illuminate\Http\JsonResponse;

interface AccountActionContract
{
    public function __invoke(?array $request = []): JsonResponse;
}
