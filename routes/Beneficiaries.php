<?php
use App\Http\Controllers\beneficiaries\benController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\beneficiaries\reqTransportController;
use App\Http\Controllers\auth\JoinActivitiesController;

Route::middleware('auth')->group(function () {
    Route::middleware('role:beneficiaries')->group(function () {
        Route::prefix('Beneficiary')->group(function(){

            // Beneficiary Controller 
            Route::get('/Homepage', [benController::class, 'homepage'])->defaults('reapply', 'false')->name('beneficiaries');
            Route::get('beneficiaries/{reapply}', [benController::class, 'homepage'])->name('beneficiaries.reapply');
            Route::get('complete-documents', [benController::class, 'getDocuments'])->name('ben.complete-doc');
            Route::post('storeDocument', [benController::class, 'storingDocument'])->name('ben.storeDoc');
    
            // Join Activity Controller
            Route::post('/BenJoinActivities/{activityID}', [JoinActivitiesController::class, 'benJoinActivities'])->name('ben.joinActivity');
            Route::get('/JoinedActivity', [JoinActivitiesController::class, 'showBenJoinActivitiesList'])->name('ben.joinActivitiesList');
            Route::post('/JoinedActivity/Cancel', [JoinActivitiesController::class, 'benCancelJoinActivity'])->name('ben.joinActivity.cancel');
    
            // Request Transport Controller
            Route::get('/reqTransport', [reqTransportController::class, 'showreqTransportController'])->name('ben.reqTransport');
            Route::post('/reqTransport', [reqTransportController::class, 'applyReqTransport'])->name('ben.applyReqTransport');
            Route::get('/reqTransportStat', [reqTransportController::class, 'showreqTransportStatus'])->name('ben.reqTransportStat');
        });
    });
});
