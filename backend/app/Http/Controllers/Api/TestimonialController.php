<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Cache;
use Illuminate\Http\JsonResponse;

class TestimonialController extends Controller
{
    public function index(): JsonResponse
    {
        $testimonials = Cache::rememberForever('api.testimonials.index', function () {
            return Testimonial::orderBy('sort_order')->get()->toArray();
        });
        return response()->json($testimonials);
    }
}
