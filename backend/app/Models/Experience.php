<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'role', 'company', 'period', 'duration_label', 'location',
        'description', 'tech', 'sort_order',
    ];

    protected $casts = [
        'tech' => 'array',
    ];
}
