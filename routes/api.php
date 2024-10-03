<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Master\PengecekanController;
use App\Http\Controllers\Master\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('test', [AuthController::class, 'index']);
Route::post('registered', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'authenticate']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('users', [UsersController::class, 'index']);

Route::post('kartupengecekan', [PengecekanController::class, 'store']);
