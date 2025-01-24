<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Master\DaftarController;
use App\Http\Controllers\Master\PengecekanController;
use App\Http\Controllers\Master\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('test', [AuthController::class, 'index']);
Route::post('registered', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'authenticate']);
Route::post('logout', [AuthController::class, 'logout']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('users', [UsersController::class, 'index']);

Route::post('kartupengecekan', [PengecekanController::class, 'store']);
Route::get('latestId', [PengecekanController::class, 'getLatestId']);
Route::get('getkartupengecekan/{idmuat}', [PengecekanController::class, 'getDataByIdMuat']);
Route::get('kartupengecekans', [PengecekanController::class, 'getPengecekan']);

Route::controller(DaftarController::class)->group(function () {
    // Get data
    Route::get('daftar', 'getDaftar');
    Route::get('nopol', 'getNoPol');

    Route::post('store/daftar', 'store');
    Route::put('daftar/update/{id}', 'update');
    Route::delete('daftar/destroy/{id}', 'destroy');

    // No Pol
    Route::post('nopol/store', 'storePlat');
    Route::put('nopol/update/{id}', 'updatePlat');
    Route::delete('nopol/destroy/{id}', 'destroyPlat');
});
