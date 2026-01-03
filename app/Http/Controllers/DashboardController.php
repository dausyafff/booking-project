<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Facility;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // pending/confirmed
        $activeReservations = Booking::where("user_id", $user->id)
            ->whereIn("status", ["pending", "confirmed"])
            ->with("facility")
            ->get();

        // ambil riwayat booking
        $historyReservations = Booking::where("user_id", $user->id)
            ->whereIn("status", ["completed", "cancelled"])
            ->latest()
            ->take(5)->get();


        return view('dashboard', compact("user", 'activeReservations', 'historyReservations'));
    }
}
