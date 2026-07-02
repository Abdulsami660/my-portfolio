<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected static function booted()
    {
        $clearCache = function () {
            \Illuminate\Support\Facades\Cache::forget('api.experiences.index');
        };

        static::saved($clearCache);
        static::deleted($clearCache);
    }
    protected $fillable = [
        'role', 'company', 'period', 'duration_label', 'location',
        'description', 'tech', 'sort_order',
    ];

    protected $casts = [
        'tech' => 'array',
    ];
}
