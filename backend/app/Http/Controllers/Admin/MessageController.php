<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\ChatDetail;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with('user')->latest('created_at')->get();
        return view('admin.messages.index', compact('messages'));
    }

    public function show(Message $message)
    {
        $chats = ChatDetail::where('message_id', $message->id)->orderBy('created_at', 'asc')->get();
        return view('admin.messages.show', compact('message', 'chats'));
    }

    public function reply(Request $request, Message $message)
    {
        $request->validate([
            'content' => 'required|string'
        ]);

        ChatDetail::create([
            'message_id' => $message->id,
            'is_me' => false,
            'text' => $request->content,
            'time' => now()->format('H:i')
        ]);

        $message->update([
            'text' => $request->content,
            'time' => now()->format('H:i'),
            'unread_count' => 0 // reset unread from admin side if needed, or leave it
        ]);

        return redirect()->back()->with('success', 'Balasan terkirim');
    }
}
