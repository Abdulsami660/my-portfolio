<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug', 'title', 'tagline', 'description', 'long_description',
        'image', 'github_url', 'live_url', 'tech', 'stats',
        'is_featured', 'sort_order',
    ];

    protected $casts = [
        'tech' => 'array',
        'stats' => 'array',
        'is_featured' => 'boolean',
    ];
}
