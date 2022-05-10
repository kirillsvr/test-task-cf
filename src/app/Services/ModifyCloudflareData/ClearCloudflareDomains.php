<?php

namespace App\Services\ModifyCloudflareData;

class ClearCloudflareDomains
{
    public function __invoke(array $cloudflareDomains): array
    {
        return array_map(function ($value) {
            return [
                'id' => $value->id,
                'name' => $value->name,
                'status' => $value->status,
                'account_id' => $value->account->id,
                'created_at' => $value->created_on,
            ];
        }, $cloudflareDomains);
    }
}
