<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
USE app\Http\Controllers\MessageController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('messsages',MessageController::class);