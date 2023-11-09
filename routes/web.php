<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\BloombergMarketsController;
use App\Http\Controllers\BloombergCurrencyPriceController;
use App\Http\Controllers\ChatgptController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('bloomberg/{category}', [BloombergMarketsController::class, 'getData']);

Route::get('bloombergcurrencyprices', [BloombergCurrencyPriceController::class, 'getData']);

Route::post('chatgptcomplete/{prompt}', [ChatgptController::class, 'store']);