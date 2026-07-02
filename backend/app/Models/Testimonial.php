<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected static function booted()
    {
        $clearCache = function () {
            \Illuminate\Support\Facades\Cache::forget('api.testimonials.index');
        };

        static::saved($clearCache);
        static::deleted($clearCache);
    }
    protected $fillable = [
        'quote', 'author', 'role', 'avatar', 'sort_order',
    ];
}
