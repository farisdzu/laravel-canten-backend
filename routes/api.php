<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Login Pertama untuk tampil di url, login kedua nama method di controller
Route::post('login', [AuthController::class,'login']);
