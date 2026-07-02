<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Cache;
use Illuminate\Http\JsonResponse;

class ExperienceController extends Controller
{
    public function index(): JsonResponse
    {
        $experiences = Cache::rememberForever('api.experiences.index', function () {
            return Experience::orderBy('sort_order')->get()->toArray();
        });
        return response()->json($experiences);
    }
}
