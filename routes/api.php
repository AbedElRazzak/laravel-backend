<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\BloombergMarketsController;
use App\Http\Controllers\BloombergCurrencyPriceController;
use App\Http\Controllers\ChatgptController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('bloomberg/{category}', [BloombergMarketsController::class, 'getData']);

Route::get('bloombergcurrencyprices', [BloombergCurrencyPriceController::class, 'getData']);

Route::post('chatgptcomplete/{prompt}', [ChatgptController::class, 'store']);
