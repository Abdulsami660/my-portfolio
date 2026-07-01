<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index(): JsonResponse
    {
        $projects = Project::orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->get()
            ->map(function ($project) {
                $project->image = env('APP_URL') . Storage::url($project->image);
                return $project;
            });

        return response()->json($projects);
    }

    public function show(string $slug): JsonResponse
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        return response()->json($project);
    }
}
