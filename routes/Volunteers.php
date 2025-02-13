<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Volunteers\volunteerController;
use App\Http\Controllers\Auth\JoinActivitiesController;

Route::middleware('auth')->group(function () {
    Route::middleware('role:volunteers')->group(function () {
        Route::prefix('Volunteer')->group(function(){
            Route::get('/Homepage', [volunteerController::class, 'homepage'])->name('volunteers');
            Route::get('/Homepage', [volunteerController::class, 'homepage'])->name('vol.homepage');
            Route::post('/joinActivity/{activityID}', [JoinActivitiesController::class, 'volJoinActivities'])->name('vol.joinActivity');
            Route::get('/JoinedActivities', [JoinActivitiesController::class, 'showVolJoinActivitiesList'])->name('vol.joinedActivities');
            Route::post('/cancelActivity/{activityID}', [JoinActivitiesController::class, 'volCancelJoinActivity'])->name('vol.joinActivity.cancel');
        });
    });
});