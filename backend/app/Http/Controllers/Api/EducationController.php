<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Cache;
use Illuminate\Http\JsonResponse;

class EducationController extends Controller
{
    public function index(): JsonResponse
    {
        $educations = Cache::rememberForever('api.educations.index', function () {
            return Education::orderBy('sort_order')->get()->toArray();
        });
        return response()->json($educations);
    }
}
