<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('test', [AuthController::class, 'index']);
Route::post('registered', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'authenticate']);
