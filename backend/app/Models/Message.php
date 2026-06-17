<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'user_id',
        'sender_name',
        'avatar',
        'text',
        'time',
        'unread_count',
        'is_online',
    ];

    protected $casts = [
        'is_online' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chatDetails()
    {
        return $this->hasMany(ChatDetail::class);
    }
}
