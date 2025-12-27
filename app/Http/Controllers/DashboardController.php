<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;

class DashboardController extends Controller
{
    public function index()
    {
        $facilities = Facility::withCount(['slots', 'bookings'])->get();

        return view('dashboard', compact('facilities'));
    }
}
