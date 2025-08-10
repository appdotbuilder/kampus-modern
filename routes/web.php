<?php

use App\Http\Controllers\Admin\FacultyController as AdminFacultyController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudyProgramController;
use Illuminate\Support\Facades\Route;

Route::get('/health-check', function () {
    return response()->json([
        'status' => 'ok',
        'timestamp' => now()->toISOString(),
    ]);
})->name('health-check');

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('news', NewsController::class)->only(['index', 'show']);
Route::resource('faculties', FacultyController::class)->only(['index']);
Route::resource('study-programs', StudyProgramController::class)->only(['index']);
Route::resource('gallery', GalleryController::class)->only(['index']);
Route::get('/page/{slug}', [PageController::class, 'show'])->name('page');

// Admin routes (protected)
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return inertia('admin/dashboard');
    })->name('dashboard');
    
    Route::resource('faculties', AdminFacultyController::class);
    Route::resource('students', StudentController::class);
    Route::resource('news', AdminNewsController::class);
});

// User dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return redirect()->route('admin.dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
