<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function avaiableSlots($id, Request $request)
    {
        $date = $request->date;

        $slots = Slot::where("facility_id", $id)
            ->where("is_active", true)
            ->where(function ($q) use ($date) {
                $q->where("date", $date)
                    ->orWhere("Day_of_week", date("w", strtotime($date)));
            })->get();

        return response()->json($slots, 200);
    }
}
