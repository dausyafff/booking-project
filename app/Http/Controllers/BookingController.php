<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\CssSelector\Node\FunctionNode;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Auth::user()->bookings()->latest()->get();
        return response()->json($bookings, 200);
    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'facility_id'      => 'required|exists:facilities,id',
            'reservation_date' => 'required|date',
            'start_time'       => 'required|date_format:H:i',
            'guest_count'      => 'required|integer|min:1',
            'total_price'      => 'required',
        ]);

        try {
            $booking = Booking::create([
                'user_id'          => auth()->id(),
                'facility_id'      => $request->facility_id,
                'reservation_date' => $request->reservation_date,
                'start_time'       => $request->start_time,
                'end_time'         => \Carbon\Carbon::parse($request->start_time)->addHours(2)->format('H:i'),
                'guest_count'      => $request->guest_count,
                'status'           => 'pending',
                'total_price'      => $request->total_price,
            ]);

            // Pastikan redirect ini mengarah ke route yang benar
            return redirect()->route('booking.checkout', ['id' => $booking->id])
                ->with('success', 'Reservasi berhasil dibuat!');
        } catch (\Exception $e) {
            // Jika error, kembali ke form dan tampilkan pesan errornya
            return back()->withErrors(['msg' => 'Gagal menyimpan ke database: ' . $e->getMessage()]);
        }
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

    // public function create(Request $request)
    // {
    //     $facility = Facility::findOrFail($request->facility_id);
    //     $selectedDate = $request->date;

    //     return view('booking.create', compact('facility', 'selectedDate'));
    // }

    public function create(Request $request)
    {
        // Mengambil ID dari request, atau dari session jika redirect balik karena error validasi
        $facilityId = $request->facility_id ?? old('facility_id');
        $selectedDate = $request->date ?? old('reservation_date');

        if (!$facilityId) {
            return redirect()->route("dashboard")->with('error', 'Silahkan pilih meja terlebih dahulu.');
        }

        $facility = Facility::findOrFail($facilityId);

        return view('booking.create', compact('facility', 'selectedDate'));
    }

    public function show($id)
    {
        $booking = Booking::with('facility')->findOrFail($id);

        // Pastikan user hanya bisa melihat booking miliknya sendiri
        if ($booking->user_id !== auth()->id()) {
            abort(403, "akses ditolak.");
        }

        return view('booking.show', compact('booking'));
    }
}