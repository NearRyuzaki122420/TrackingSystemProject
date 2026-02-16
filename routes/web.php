<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackingController;

Route::get('/', [TrackingController::class, 'index'])->name('trackings.index');
Route::post('/trackings', [TrackingController::class, 'store'])->name('trackings.store');
Route::put('/trackings/{id}', [TrackingController::class, 'update'])->name('trackings.update');
Route::delete('/trackings/{id}', [TrackingController::class, 'destroy'])->name('trackings.destroy');
Route::get('/trackings/{id}', [TrackingController::class, 'show'])->name('trackings.show');

