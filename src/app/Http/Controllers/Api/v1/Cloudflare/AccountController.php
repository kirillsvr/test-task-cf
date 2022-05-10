<?php

namespace App\Http\Controllers\Api\v1\Cloudflare;

use App\Contracts\Actions\AccountActionContract;
use App\Contracts\Actions\AccountStoreActionContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cloudflare\AccountIndexRequest;
use App\Http\Requests\Cloudflare\AccountStoreRequest;

class AccountController extends Controller
{
    public function index(AccountIndexRequest $request, AccountActionContract $action)
    {
        return $action($request->validated());
    }

    public function store(AccountStoreRequest $request, AccountStoreActionContract $action)
    {
        return $action($request->validated());
    }
}
