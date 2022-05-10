<?php

namespace App\Http\Resources\Cloudflare;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class AccountsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => strtolower(Str::before($this->name, '\'s ')),
            'created_at' => $this->created_on,
        ];
    }
}
