<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Slot;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    public function check(Request $request)
    {
        $location = $request->query('location');
        $startTime = $request->query('start_time');
        $guestCount = $request->query('guest_count');

        $query = Facility::with(['slots']);

        // Jika lokasi diisi, baru kita filter
        if ($location) {
            $query->where('location', 'LIKE', "%$location%");
        }

        // Filter Kapasitas (Angka)
        if ($guestCount) {
            $query->where('capacity', '>=', (int)$guestCount);
        }

        // Filter Waktu
        if ($startTime) {
            $query->whereHas('slots', function ($q) use ($startTime) {
                $q->where('start_time', '<=', $startTime)
                    ->where('end_time', '>', $startTime);
            });
        }

        $availableFacilities = $query->get();

        return response()->json([
            'success' => true,
            'data' => $availableFacilities
        ]);
    }
}
