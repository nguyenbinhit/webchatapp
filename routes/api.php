<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\SettingContactController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// User routes
Route::prefix('users')->group(function () {
    Route::post('/login', [UserController::class, 'login']);

    Route::put('/{id}', [UserController::class, 'update'])->middleware('auth:sanctum');
});

// Client routes
Route::prefix('clients')->group(function () {
    Route::post('/login', [ClientController::class, 'login']);

    Route::get('/', [ClientController::class, 'index'])->middleware('auth:sanctum');
});

// Code routes
Route::prefix('codes')->group(function () {
    Route::get('/', [CodeController::class, 'index']);
    Route::post('/', [CodeController::class, 'store'])->middleware('auth:sanctum');
    Route::get('/{id}', [CodeController::class, 'show']);
    Route::put('/{id}', [CodeController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('/{id}', [CodeController::class, 'destroy'])->middleware('auth:sanctum');
});

// Setting web contact
Route::prefix('settings/contact')->group(function () {
    Route::get('/', [SettingContactController::class, 'show']);
    Route::post('/', [SettingContactController::class, 'saveData'])->middleware('auth:sanctum');
});
