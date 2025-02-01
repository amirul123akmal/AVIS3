<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\volunteers\volunteerController;

Route::middleware('auth')->group(function () {
    Route::middleware('role:volunteers')->group(function () {
        Route::get('volunteers', [volunteerController::class, 'homepage'])->name('volunteers');
    });
});