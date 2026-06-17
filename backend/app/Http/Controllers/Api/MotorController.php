<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    public function index(Request $request)
    {
        $query = Motor::with('category');

        // Filter by category name
        if ($request->has('category') && $request->category !== 'Semua') {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        // Filter by availability
        if ($request->has('available')) {
            $query->where('is_available', $request->boolean('available'));
        }

        // Search by name
        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $motors = $query->get();

        return response()->json([
            'success' => true,
            'data'    => $motors,
        ]);
    }

    public function show(Motor $motor)
    {
        $motor->load('category');

        return response()->json([
            'success' => true,
            'data'    => $motor,
        ]);
    }
}
