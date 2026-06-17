<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Semua booking milik user tertentu (user_id dari request atau default user 1)
    public function index(Request $request)
    {
        $userId = $request->header('X-User-Id', 1);

        $bookings = Booking::with('motor.category')
            ->where('user_id', $userId)
            ->orderByDesc('created_at')
            ->get();

        return response()->json([
            'success' => true,
            'data'    => $bookings,
        ]);
    }

    public function show(Booking $booking)
    {
        $booking->load('motor.category', 'user');

        return response()->json([
            'success' => true,
            'data'    => $booking,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'         => 'required|exists:users,id',
            'motor_id'        => 'required|exists:motors,id',
            'start_date'      => 'required|string',
            'end_date'        => 'required|string',
            'duration_days'   => 'required|integer|min:1',
            'total_price'     => 'required|integer|min:0',
            'payment_method'  => 'nullable|string',
            'pickup_location' => 'nullable|string',
        ]);

        $validated['status'] = 'Aktif';

        $booking = Booking::create($validated);
        $booking->load('motor.category');

        return response()->json([
            'success' => true,
            'message' => 'Booking berhasil dibuat.',
            'data'    => $booking,
        ], 201);
    }
}
