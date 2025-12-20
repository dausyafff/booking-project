<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Slot;
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
            'date' => 'required|date',
            'time' => 'required|string',
            'service_id' => 'required|integer|exists:services,id',
        ]);

        $slot = Slot::findOrFail($request->slot_id);

        // Cek double booking
        $exist = Booking::where("facility_id", $slot->facility_id)
            ->where("date", $request->date)
            ->where("slot_id", $slot->id)
            ->whereIn("status", ["pending", "confirmed"])
            ->exists();
        if ($exist) {
            return response()->json(['message' => 'Slot already booked'], 409);
        }
        Booking::create([
            "user_id" => Auth::id(),
            "facility_id" => $slot->facility_id,
            "slot_id" => $slot->id,
            "date" => $request->date,
            "start_time" => $slot->start_time,
            "end_time" => $slot->end_time,
            "status" => "pending"
        ]);
        return back()->with("success", "Booking created successfully");
    }
}
