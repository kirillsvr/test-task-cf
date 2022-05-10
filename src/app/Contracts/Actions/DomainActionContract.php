<?php

namespace App\Contracts\Actions;

use Illuminate\Http\JsonResponse;

interface DomainActionContract
{
    public function __invoke(?array $request = []): JsonResponse;
}
