<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\DomainsCollection;
use App\Models\Domain;

class DomainController extends Controller
{
    public function index()
    {
        return new DomainsCollection(Domain::with('account')->get());
    }
}
