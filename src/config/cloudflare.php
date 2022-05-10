<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cloudflare api key
    |--------------------------------------------------------------------------
    |
    | You need to get an api key in your personal account cloudflare.com
    |
    */
    'api_key' => env('CLOUDFLARE_API_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | Cloudflare email
    |--------------------------------------------------------------------------
    |
    | Email of the account where you received the api key
    |
    */
    'email' => env('CLOUDFLARE_EMAIL', ''),
];
