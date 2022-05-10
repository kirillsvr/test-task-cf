<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\DomainController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/domains', [DomainController::class, 'index']);
Route::get('/cloudflare/domains', [\App\Http\Controllers\Api\v1\Cloudflare\DomainController::class, 'index']);
Route::get('/cloudflare/accounts', [\App\Http\Controllers\Api\v1\Cloudflare\AccountController::class, 'index']);
Route::post('/cloudflare/accounts', [\App\Http\Controllers\Api\v1\Cloudflare\AccountController::class, 'store']);
