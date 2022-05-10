<?php

namespace App\Services\ModifyCloudflareData;

use Illuminate\Support\Str;

class ClearCloudflareAccounts
{
    public function __invoke(array $cloudflareAccounts): array
    {
        return array_map(function ($value) {
            return [
                'id' => $value->id,
                'name' => strtolower(Str::before($value->name, '\'s ')),
                'created_at' => $value->created_on,
            ];
        }, $cloudflareAccounts);
    }
}
