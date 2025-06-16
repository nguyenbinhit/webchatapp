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

    Route::get('/info', [ClientController::class, 'index'])->middleware('auth:sanctum');
});

// Client routes
Route::prefix('clients')->group(function () {
    Route::post('/login', [ClientController::class, 'login']);

    Route::get('/', [ClientController::class, 'index'])->middleware('auth:sanctum');
});

// Code routes
Route::prefix('codes')->group(function () {
    Route::get('/', [ClientController::class, 'index']);
    Route::post('/', [ClientController::class, 'store'])->middleware('auth:sanctum');
    Route::get('/{id}', [ClientController::class, 'show']);
    Route::put('/{id}', [ClientController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('/{id}', [ClientController::class, 'destroy'])->middleware('auth:sanctum');
});

// Setting web contact
Route::prefix('settings/contact')->group(function () {
    Route::get('/', [ClientController::class, 'show']);
    Route::post('/', [ClientController::class, 'saveData'])->middleware('auth:sanctum');
});
