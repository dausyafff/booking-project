<?php

use App\Http\Controllers\AvailabilityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// endpoint ini bisa diakses tanpa autentikasi
Route::get("/check-availability", [AvailabilityController::class, 'check']);
