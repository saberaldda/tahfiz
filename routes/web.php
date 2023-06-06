<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin
Route::prefix('admin')
    ->middleware(['auth'])
    ->group(function () {
        // // Auth
        // Route::get('login', [AuthController::class, 'login'])->name('login')->withoutMiddleware(['auth', 'checkUserType']);
        // Route::get('forget-password', [AuthController::class, 'forgetPassword'])->name('forget-password')->withoutMiddleware(['auth', 'checkUserType']);
        // Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        // // Dashboard
        // Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // // Users
        // Route::resource('users', UserController::class)->only('index', 'edit');
        // Courses
        Route::resource('courses', CourseController::class)->only('index', 'edit');
        // Paths
        Route::resource('paths', PathController::class)->only('index', 'edit');

    });
