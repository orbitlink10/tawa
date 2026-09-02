<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WelcomeController;

Route::post("/test/",[WelcomeController::class,'testApi']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});


Route::group(['prefix' => 'v1'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
});

