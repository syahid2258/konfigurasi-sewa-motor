<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PointHistory;
use Illuminate\Http\Request;

class PointHistoryController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->header('X-User-Id', 1);

        return response()->json([
            'success' => true,
            'data'    => PointHistory::where('user_id', $userId)->orderByDesc('created_at')->get(),
        ]);
    }
}
