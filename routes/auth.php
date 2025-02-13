<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
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

// common
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ManageAccountController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ManageAccountController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ManageAccountController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('choose', [RegisteredUserController::class, 'getChoose']);
    Route::get('choose/{type}', [RegisteredUserController::class, 'manageChoose']);
    
    Route::get('complete-profile', [RegisteredUserController::class, 'completeProfile']);
    Route::post('complete-profile', [RegisteredUserController::class, 'storeProfile']);
});

Route::middleware('auth')->group(function () {
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

require __DIR__ . '/Admin.php';
require __DIR__ . '/Beneficiaries.php';
require __DIR__ . '/Volunteers.php';