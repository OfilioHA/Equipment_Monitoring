<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\CommandController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('computers')->group(function(){
    Route::get('/list', [ComputerController::class, 'list']);
    Route::get('/history', [ComputerController::class, 'history']);
});

Route::prefix('commands')->group(function(){
    Route::get('/execute/{id}', [CommandController::class, 'execute']);
});

Route::get('/monitoring/{id}', [ComputerController::class, 'monitoring']);