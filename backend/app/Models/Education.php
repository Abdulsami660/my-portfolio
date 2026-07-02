<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected static function booted()
    {
        $clearCache = function () {
            \Illuminate\Support\Facades\Cache::forget('api.educations.index');
        };

        static::saved($clearCache);
        static::deleted($clearCache);
    }
    protected $fillable = [
        'year', 'degree', 'school', 'subtitle', 'note', 'sort_order',
    ];
}
