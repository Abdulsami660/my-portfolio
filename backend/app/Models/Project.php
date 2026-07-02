<?php

namespace App\Models;

use Cache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected static function booted()
    {
        $clearCache = function ($project) {
            // Clear the index cache
            Cache::forget('api.projects.index');
            
            // Clear the specific show cache
            Cache::forget("api.projects.show.{$project->slug}");
        };

        // Trigger whenever a project is saved (created/updated) or deleted
        static::saved($clearCache);
        static::deleted($clearCache);
    }
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
