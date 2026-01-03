<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Auth::user()->bookings()->latest()->get();
        return response()->json($bookings, 200);
    }


    public function store(Request $request)
    {
        $request->validate([
            'facility_id' => 'required',
            'reservation_date' => 'required|date',
            'start_time' => 'required',
            'guest_count' => 'required|integer',
        ]);

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'facility_id' => $request->facility_id,
            'reservation_date' => $request->reservation_date,
            'start_time' => $request->start_time,
            'end_time' => \Carbon\Carbon::parse($request->start_time)->addHours(2), // Durasi default 2 jam
            'guest_count' => $request->guest_count,
            'status' => 'pending',
            'total_price' => $request->total_price,
        ]);

        return redirect()->route('booking.checkout', $booking->id)->with('success', 'Reservasi berhasil dibuat!');
    }

    public function checkout($id)
    {
        $booking = Booking::with('facility')->findOrFail($id);

        // Pastikan user hanya bisa melihat checkout miliknya sendiri
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }

        return view('booking.checkout', compact('booking'));
    }

    public function create(Request $request)
    {
        $facility = Facility::findOrFail($request->facility_id);
        $selectedDate = $request->date;

        return view('booking.create', compact('facility', 'selectedDate'));
    }
}
