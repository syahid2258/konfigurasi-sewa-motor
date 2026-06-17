<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'motor_id',
        'start_date',
        'end_date',
        'duration_days',
        'total_price',
        'status',
        'payment_method',
        'pickup_location',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function motor()
    {
        return $this->belongsTo(Motor::class);
    }
}
