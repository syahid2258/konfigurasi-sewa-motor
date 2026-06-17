<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ChatDetail;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatDetailController extends Controller
{
    // List semua chat detail dalam satu konversasi
    public function index(Message $message)
    {
        $chats = $message->chatDetails()->orderBy('created_at')->get();

        return response()->json([
            'success' => true,
            'data'    => $chats,
        ]);
    }

    // Kirim pesan baru
    public function store(Request $request, Message $message)
    {
        $validated = $request->validate([
            'text'  => 'required|string',
            'is_me' => 'required|boolean',
        ]);

        $now = now()->format('H:i');

        $chat = ChatDetail::create([
            'message_id' => $message->id,
            'text'       => $validated['text'],
            'is_me'      => $validated['is_me'],
            'time'       => $now,
        ]);

        // Update preview teks di tabel messages
        $message->update([
            'text' => $validated['text'],
            'time' => $now,
        ]);

        return response()->json([
            'success' => true,
            'data'    => $chat,
        ], 201);
    }
}
