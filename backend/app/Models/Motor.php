<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'brand',
        'image',
        'price',
        'year',
        'cc',
        'transmission',
        'fuel_type',
        'color',
        'rating',
        'review_count',
        'plate_number',
        'is_available',
        'description',
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'rating' => 'float',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
