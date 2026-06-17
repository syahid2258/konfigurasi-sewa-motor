<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Motor;
use App\Models\User;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $metrics = [
            'total_motors' => Motor::count(),
            'total_users' => User::count(),
            'active_bookings' => Booking::where('status', 'Aktif')->count(),
            'total_revenue' => Booking::where('status', 'Selesai')
                ->get()
                ->sum(function($b) {
                    return (int) str_replace(['Rp', '.', ' '], '', $b->price);
                })
        ];

        return view('admin.dashboard', compact('metrics'));
    }
}
