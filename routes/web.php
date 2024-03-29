<?php

use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\ActivityOptionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// Lang
Route::get('ar', function() {
    session(['locale' => 'ar']);
    return back();
})->name('ar');

Route::get('en', function() {
    session(['locale' => 'en']);
    return back();
})->name('en');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Home
Route::get('/', [HomeController::class, 'index']);

// Admin
Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::get('/', function () { return redirect()->route('dashboard'); });
    // Dashboard
    Route::get('dashboard', function () {
        return redirect()->route('users.index');
    })->middleware(['auth', 'verified'])->name('dashboard');
    // Profile
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
    
    // Users
    Route::resource('users', UserController::class)->only('index', 'edit');
    Route::get('users/evaluation', [UserController::class, 'evaluation'])->name('users.evaluation');
    Route::get('users/evaluation/update', [UserController::class, 'editEvaluation'])->name('users.evaluation.edit');
    Route::get('users/points-table', [UserController::class, 'showPoints'])->name('users.points.show');
    // Activities
    Route::resource('activities', ActivityController::class)->only('index', 'edit');
    Route::resource('activities/{activity}/options', ActivityOptionController::class)->only('index', 'edit')->names([
        'index' => 'activities.options.index',
        'edit' => 'activities.options.edit',
    ]);
    // Settings
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');

});
