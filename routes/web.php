<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackingController;

Route::get('/', [TrackingController::class, 'index'])->name('trackings.index');

Route::post('/trackings', [TrackingController::class, 'store'])->name('trackings.store');
Route::put('/trackings/{tracking}', [TrackingController::class, 'update'])->name('trackings.update');
Route::delete('/trackings/{tracking}', [TrackingController::class, 'destroy'])->name('trackings.destroy');
