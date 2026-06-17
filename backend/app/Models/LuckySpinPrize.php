<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LuckySpinPrize extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'icon'];
}
