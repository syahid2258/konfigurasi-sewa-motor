<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->header('X-User-Id', 1);

        $messages = Message::where('user_id', $userId)
            ->orderByDesc('updated_at')
            ->get();

        return response()->json([
            'success' => true,
            'data'    => $messages,
        ]);
    }
}
