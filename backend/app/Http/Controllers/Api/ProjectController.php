<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index(): JsonResponse
    {
        $projects = Cache::rememberForever('api.projects.index', function () {
            return Project::orderByDesc('is_featured')
                ->orderBy('sort_order')
                ->get()
                ->map(function ($project) {
                    // Quick tip: Use config('app.url') instead of env() in controllers
                    $project->image = config('app.url') . Storage::url($project->image);
                    return $project;
                })->toArray();
        });

        return response()->json($projects);
    }

    public function show(string $slug): JsonResponse
    {
        $project = Cache::rememberForever("api.projects.show.{$slug}", function () use ($slug) {
            return Project::where('slug', $slug)->firstOrFail()->toArray();
        });

        return response()->json($project);
    }
}
