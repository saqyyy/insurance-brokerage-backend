<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\PolicyController;
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

Route::prefix('v1')->group(function () {
    Route::get('/clients', [ClientController::class, 'index']);
    Route::get('/clients/{id}', [ClientController::class, 'show']);
    Route::post('/clients/policy', [PolicyController::class, 'store']);
    Route::get('/clients/policy/{id}', [PolicyController::class, 'show']);
    Route::patch('/clients/policy/{id}', [PolicyController::class, 'update']);
    Route::get('/clients/policy/search/{client_id}', [PolicyController::class, 'search']);
});