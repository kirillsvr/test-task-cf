<?php

namespace App\Http\Controllers\Api\v1\Cloudflare;

use App\Contracts\Actions\DomainActionContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cloudflare\DomainIndexRequest;

class DomainController extends Controller
{
    public function index(DomainIndexRequest $request, DomainActionContract $action)
    {
        return $action($request->validated());
    }
}
