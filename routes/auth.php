<?php
use App\Http\Controllers\volunteers\volunteerController;
use App\Http\Controllers\Admin\adminController;
use App\Http\Controllers\Admin\EvalBenInfo;
use App\Http\Controllers\Admin\ManageActivity;
use App\Http\Controllers\Admin\ManageTransportController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\beneficiaries\benController;
use App\Http\Controllers\ManageAccountController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    
    // Common
    Route::get('/profile', [ManageAccountController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ManageAccountController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ManageAccountController::class, 'destroy'])->name('profile.destroy');

    // Volunteers
    Route::middleware('role:volunteers')->group(function () {
        Route::get('volunteers', [volunteerController::class, 'homepage'])->name('volunteers');
    });

    // Beneficiaries
    Route::middleware('role:beneficiaries')->group(function () {
        Route::get('beneficiaries', [benController::class, 'homepage'])->defaults('reapply', 'false')->name('beneficiaries');
        Route::get('beneficiaries/{reapply}', [benController::class, 'homepage'])->name('beneficiaries.reapply');
        Route::get('complete-documents', [benController::class, 'getDocuments']);
        Route::post('storeDocument', [benController::class, 'storingDocument']);
    });

    // Admin
    Route::middleware('role:admin')->group(function () {
        Route::prefix('Admin')->group(function () {
            Route::get('/', [adminController::class, 'homepage'])->name('admin');
            Route::get('Evaluating-Beneficiaries', [EvalBenInfo::class, 'page']);

            // Manage Transport Controller
            Route::get('Manage-Transport', [ManageTransportController::class, 'transport'])->name('Manage-Transport');
            Route::get('Create-Transport', [ManageTransportController::class, 'createTransport'])->name('Create-Transport');
            Route::put('Create-Transport', [ManageTransportController::class, 'createTransportPost'])->name('Create-TransportPost');
            Route::get('Update-Transport', [ManageTransportController::class, 'updateTransport'])->defaults('id', 0)->name('Update-Transport');
            Route::get('Update-Transport/{id}', [ManageTransportController::class, 'updatingTransport'])->name('Updating-Transport');
            Route::put('Update-Transport/{id}', [ManageTransportController::class, 'updateTransportPost'])->name('Update-TransportPost');
            Route::get('Delete-Transport', [ManageTransportController::class, 'deleteTransport'])->name('Delete-Transport');
            Route::delete('Delete-Transport', [ManageTransportController::class, 'deleteTransportPost'])->name('Delete-TransportPost');
            // Manage Activity Controller
            Route::get('Activity', [ManageActivity::class, 'page'])->name('Activity');
            Route::get('DeleteActivity', [ManageActivity::class, 'deleteActivity'])->name('activity.delete');
            Route::delete('Activity/{id}', [ManageActivity::class, 'destroyActivity'])->name('activity.destroy');
            Route::get('editActivity', [ManageActivity::class, 'editActivity'])->name('activity.edit')->defaults('id', 0);
            Route::get('editActivity/{id}', [ManageActivity::class, 'editActivity'])->name('activity.getedit');
            Route::put('editActivity/{id}', [ManageActivity::class, 'editActivityPost'])->name('activity.editPost');
            Route::get('addActivity', [ManageActivity::class, 'addActivity'])->name('addActivity');
            Route::post('addActivity', [ManageActivity::class, 'addActivityPost'])->name('addActivityPost');
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::get('choose', [RegisteredUserController::class, 'getChoose']);
    Route::get('choose/{type}', [RegisteredUserController::class, 'manageChoose']);

    Route::get('complete-profile', [RegisteredUserController::class, 'completeProfile']);
    Route::post('complete-profile', [RegisteredUserController::class, 'storeProfile']);

    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});