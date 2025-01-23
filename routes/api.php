<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Master\PengecekanController;
use App\Http\Controllers\Master\UsersController as MasterUsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('users', [UsersController::class, 'index']);

Route::post('kartupengecekan', [PengecekanController::class, 'store']);
