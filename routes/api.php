<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DividaController;
use App\Http\Controllers\GastoController;
use App\Models\Divida;

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

Route::get('raul', function() {
    dd('aqui');
});



Route::post('login', [AuthController::class, 'login']);
Route::post('gastos/store', [GastoController::class, 'store']);
Route::post('dividas/store', [DividaController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
