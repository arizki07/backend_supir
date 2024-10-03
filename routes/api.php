<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('test', [AuthController::class, 'index']);
Route::get('users', [UsersController::class, 'index']);
Route::get('profile', [ProfileController::class, 'index']);
Route::post('registered', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'authenticate']);
