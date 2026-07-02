<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected static function booted()
    {
        $clearCache = function () {
            \Illuminate\Support\Facades\Cache::forget('api.skills.index');
        };

        static::saved($clearCache);
        static::deleted($clearCache);
    }
    protected $fillable = [
        'name', 'category', 'description', 'percentage', 'sort_order',
    ];
}
