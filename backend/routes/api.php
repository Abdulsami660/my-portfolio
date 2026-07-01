<?php

use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\EducationController;
use App\Http\Controllers\Api\ExperienceController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{slug}', [ProjectController::class, 'show']);

Route::get('/skills', [SkillController::class, 'index']);
Route::get('/experience', [ExperienceController::class, 'index']);
Route::get('/education', [EducationController::class, 'index']);
Route::get('/testimonials', [TestimonialController::class, 'index']);

Route::post('/contact', [ContactController::class, 'store']);
