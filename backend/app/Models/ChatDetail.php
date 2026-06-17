<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatDetail extends Model
{
    protected $fillable = [
        'message_id',
        'text',
        'is_me',
        'time',
    ];

    protected $casts = [
        'is_me' => 'boolean',
    ];

    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
