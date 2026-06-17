<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LuckySpinPrize;
use App\Models\User;

class LuckySpinController extends Controller
{
    public function info(Request $request)
    {
        $userId = $request->header('X-User-Id');
        $user = User::find($userId);
        
        return response()->json([
            'data' => [
                'prizes' => LuckySpinPrize::all(),
                'user_points' => $user ? $user->points : 0,
                'points_required' => 1000
            ]
        ]);
    }

    public function spin(Request $request)
    {
        $userId = $request->header('X-User-Id');
        $user = User::find($userId);
        $pointsRequired = 1000;

        if (!$user) {
            return response()->json(['message' => 'User tidak ditemukan'], 404);
        }

        if ($user->points < $pointsRequired) {
            return response()->json(['message' => 'Poin tidak cukup'], 400);
        }

        $prizes = LuckySpinPrize::all();
        if ($prizes->isEmpty()) {
            return response()->json(['message' => 'Hadiah belum tersedia'], 404);
        }

        // Deduct points
        $user->points -= $pointsRequired;
        $user->save();

        // Pick random prize
        $randomPrize = $prizes->random();

        // Optional: record to point_histories
        \App\Models\PointHistory::create([
            'user_id' => $user->id,
            'title' => 'Main Lucky Spin - ' . $randomPrize->title,
            'points' => $pointsRequired,
            'is_earned' => false,
            'date' => now()->format('d M Y'),
        ]);

        return response()->json([
            'data' => [
                'prize' => $randomPrize,
                'user_points' => $user->points
            ]
        ]);
    }
}
