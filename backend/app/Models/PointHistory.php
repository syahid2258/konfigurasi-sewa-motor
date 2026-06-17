<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointHistory extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'points',
        'is_earned',
        'date',
    ];

    protected $casts = [
        'is_earned' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
