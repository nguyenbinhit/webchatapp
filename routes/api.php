<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\ManagementMessageController;
use App\Http\Controllers\MessageController;
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
    Route::delete('/{id}', [ClientController::class, 'destroy'])->middleware('auth:sanctum');
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
Route::prefix('setting_contacts')->group(function () {
    Route::get('/', [SettingContactController::class, 'show']);
    Route::post('/', [SettingContactController::class, 'saveData'])->middleware('auth:sanctum');
    Route::get('/check-code/{code}', [SettingContactController::class, 'checkCode']);
});

// Management messages
Route::prefix('management-messages')->group(function () {
    Route::get('/', [ManagementMessageController::class, 'index']);
    Route::post('/', [ManagementMessageController::class, 'store'])->middleware('auth:sanctum');
    Route::get('/{id}', [ManagementMessageController::class, 'show']);
    Route::post('/{id}', [ManagementMessageController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('/{id}', [ManagementMessageController::class, 'destroy'])->middleware('auth:sanctum');
});

// Message routes
Route::prefix('messages')->group(function () {
    Route::get('/list-by-client/{id}', [MessageController::class, 'listByClient']);
    Route::post('/save-data', [MessageController::class, 'saveData'])->middleware('auth:sanctum');
});

// Fallback route for undefined routes
Route::fallback(function () {
    return response()->json(['message' => 'Not Found'], 404);
});
