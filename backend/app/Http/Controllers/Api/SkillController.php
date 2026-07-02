<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Cache;
use Illuminate\Http\JsonResponse;

class SkillController extends Controller
{
    public function index(): JsonResponse
    {
        $skills = Cache::rememberForever('api.skills.index', function () {
            return Skill::orderBy('sort_order')->get()->toArray();
        });
        return response()->json($skills);
    }
}
