<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// Protect admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware('auth')->group(function () {

    Route::get("/booking/create", [BookingController::class, "create"])->name("booking.create");
    Route::post("/booking/store", [BookingController::class, "store"])->name("booking.store");

    // route payment ,coming soon
    Route::get("/booking/checkout/{id}", [BookingController::class, "checkout"])->name("booking.checkout");



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get("/bookings", [BookingController::class, 'index'])->name('bookings.index');
//     Route::post("/bookings", [BookingController::class, 'store'])->name('bookings.store');
require __DIR__ . '/auth.php';
