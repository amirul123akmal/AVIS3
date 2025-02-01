<?php
use App\Http\Controllers\beneficiaries\benController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::middleware('role:beneficiaries')->group(function () {
        Route::get('beneficiaries', [benController::class, 'homepage'])->defaults('reapply', 'false')->name('beneficiaries');
        Route::get('beneficiaries/{reapply}', [benController::class, 'homepage'])->name('beneficiaries.reapply');
        Route::get('complete-documents', [benController::class, 'getDocuments']);
        Route::post('storeDocument', [benController::class, 'storingDocument']);
    });
});