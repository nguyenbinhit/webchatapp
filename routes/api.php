<?php

use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('clients')->group(function () {
    Route::post('/login', [ClientController::class, 'login']);

    Route::get('/', [ClientController::class, 'index']);
});
