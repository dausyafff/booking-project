<?php

use App\Models\Booking;
use Illuminate\Support\Facades\Schedule;

// Hapus yang 'payment_deadline' jika kolomnya memang tidak ada di database
Schedule::call(function () {
    $count = Booking::where('status', 'pending')
        ->where('created_at', '<', now()->subHour())
        ->update(['status' => 'cancelled']);

    if ($count > 0) {
        logger("Auto-cancel: Berhasil membatalkan $count reservasi.");
    }
})->everyMinute();
