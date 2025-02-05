<?php
use App\Http\Controllers\beneficiaries\benController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\beneficiaries\reqTransportController;
use App\Http\Controllers\beneficiaries\JoinActivities;

Route::middleware('auth')->group(function () {
    Route::middleware('role:beneficiaries')->group(function () {
        Route::get('beneficiaries', [benController::class, 'homepage'])->defaults('reapply', 'false')->name('beneficiaries');
        Route::get('beneficiaries/{reapply}', [benController::class, 'homepage'])->name('beneficiaries.reapply');
        Route::get('complete-documents', [benController::class, 'getDocuments']);
        Route::post('storeDocument', [benController::class, 'storingDocument']);

        // Join Activity Controller
        Route::get('/joinActivities', [JoinActivities::class, 'showJoinActivities']) -> name('admin.joinActivities');
        Route::get('/joinActivitiesList', [JoinActivities::class, 'showJoinActivitiesList']) -> name('admin.joinActivitiesList');

        // Request Transport Controller
        Route::get('/reqTransport', [reqTransportController::class, 'showreqTransportController']) -> name('admin.reqTransport');
        Route::get('/reqTransportStat', [reqTransportController::class, 'showreqTransportStatus']) -> name('admin.reqTransportStat');
    });
});