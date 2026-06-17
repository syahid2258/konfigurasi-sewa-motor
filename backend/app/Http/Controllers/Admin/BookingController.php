<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'motor'])->latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function edit(Booking $booking)
    {
        return view('admin.bookings.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $data = $request->validate([
            'status' => 'required|in:Menunggu,Aktif,Selesai,Dibatalkan'
        ]);

        $booking->update($data);

        return redirect()->route('admin.bookings.index')->with('success', 'Status pesanan berhasil diperbarui');
    }
}
