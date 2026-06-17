<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->header('X-User-Id', 1);

        $notifications = Notification::where('user_id', $userId)
            ->orderByDesc('created_at')
            ->get();

        return response()->json([
            'success' => true,
            'data'    => $notifications,
        ]);
    }
}
