<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\ContactSubmissionController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamMemberController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::post('/admin/login', [AuthController::class, 'login']);

// CMS - public read
Route::get('/cms/pages/{page}', [CmsController::class, 'getPage']);
Route::post('/contact', [ContactSubmissionController::class, 'store']);

Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/{service}', [ServiceController::class, 'show']);

Route::get('/references', [ReferenceController::class, 'index']);
Route::get('/references/{reference}', [ReferenceController::class, 'show']);

Route::get('/team', [TeamMemberController::class, 'index']);
Route::get('/team/{teamMember}', [TeamMemberController::class, 'show']);

// Protected routes (admin only)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // Services
    Route::post('/services', [ServiceController::class, 'store']);
    Route::put('/services/{service}', [ServiceController::class, 'update']);
    Route::delete('/services/{service}', [ServiceController::class, 'destroy']);

    // References
    Route::post('/references', [ReferenceController::class, 'store']);
    Route::put('/references/{reference}', [ReferenceController::class, 'update']);
    Route::delete('/references/{reference}', [ReferenceController::class, 'destroy']);
    Route::delete('/reference-images/{image}', [ReferenceController::class, 'destroyImage']);

    // Team
    Route::post('/team', [TeamMemberController::class, 'store']);
    Route::put('/team/{teamMember}', [TeamMemberController::class, 'update']);
    Route::delete('/team/{teamMember}', [TeamMemberController::class, 'destroy']);

    // CMS - protected write
    Route::put('/cms/pages/{page}/sections/{section}', [CmsController::class, 'updateSection']);

    // Contact submissions
    Route::get('/contact', [ContactSubmissionController::class, 'index']);
    Route::get('/contact/{contactSubmission}', [ContactSubmissionController::class, 'show']);
    Route::put('/contact/{contactSubmission}', [ContactSubmissionController::class, 'update']);
    Route::delete('/contact/{contactSubmission}', [ContactSubmissionController::class, 'destroy']);
});
