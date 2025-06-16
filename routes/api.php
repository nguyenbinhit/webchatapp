<?php

use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// User routes
Route::prefix('users')->group(function () {
    Route::post('/login', [ClientController::class, 'login']);

    Route::get('/info', [ClientController::class, 'index']);
});

// Client routes
Route::prefix('clients')->group(function () {
    Route::post('/login', [ClientController::class, 'login']);

    Route::get('/', [ClientController::class, 'index']);
});

// Code routes
Route::prefix('codes')->group(function () {
    Route::get('/', [ClientController::class, 'index']);
    Route::post('/', [ClientController::class, 'store']);
    Route::get('/{id}', [ClientController::class, 'show']);
    Route::put('/{id}', [ClientController::class, 'update']);
    Route::delete('/{id}', [ClientController::class, 'destroy']);
});
