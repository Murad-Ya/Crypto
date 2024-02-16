<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('crypto')->group(function (){
    Route::get('index' , [\App\Http\Controllers\CryptoController::class, 'index']);
    Route::post('store' , [\App\Http\Controllers\CryptoController::class, 'store']);
    Route::put('update/{id}' , [\App\Http\Controllers\CryptoController::class, 'update']);
    Route::post('destroy/{id}' , [\App\Http\Controllers\CryptoController::class, 'destroy']);
});

Route::prefix('transaction')->group(function (){
    Route::get('/' , [\App\Http\Controllers\TransactionController::class , 'index']);
    Route::post('store' , [\App\Http\Controllers\TransactionController::class , 'store']);
});
