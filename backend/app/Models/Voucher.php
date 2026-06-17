<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = [
        'title',
        'description',
        'discount_percent',
        'points_cost',
        'expiry_date',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
