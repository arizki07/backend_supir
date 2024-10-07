<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Master\PengecekanController;
use App\Http\Controllers\Master\UsersController as MasterUsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('test', [AuthController::class, 'index']);
//users
Route::get('users', [MasterUsersController::class, 'index']);
Route::post('store/users', [MasterUsersController::class, 'store']);
Route::put('/users/update/{id}', [MasterUsersController::class, 'update']);
Route::delete('/users/destroy/{id}', [MasterUsersController::class, 'destroy']);

Route::get('profile', [ProfileController::class, 'index']);
Route::post('registered', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'authenticate']);

Route::post('pengecekan', [PengecekanController::class, 'store']);
Route::get('getPeng', [PengecekanController::class, 'getPengecekan']);
