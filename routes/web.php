<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackingController;

Route::get('/', function () {
    return redirect()->route('login');
})->middleware('guest');

// ✅ Breeze profile routes (this fixes profile.edit missing)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return inertia('Dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ✅ Protect your tracking CRUD
    Route::get('/trackings', [TrackingController::class, 'index'])->name('trackings.index');
    Route::post('/trackings', [TrackingController::class, 'store'])->name('trackings.store');
    Route::put('/trackings/{tracking}', [TrackingController::class, 'update'])->name('trackings.update');
    Route::delete('/trackings/{tracking}', [TrackingController::class, 'destroy'])->name('trackings.destroy');
});

// ✅ This must exist so /login /register /forgot-password routes work
require __DIR__.'/auth.php';