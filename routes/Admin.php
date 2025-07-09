<?php 
use App\Http\Controllers\Admin\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EvalBenInfo;
use App\Http\Controllers\Admin\ManageActivity;
use App\Http\Controllers\Admin\ManageTransportController;
use App\Http\Controllers\Admin\ManageUserInformationController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\EvaluateTransportController;
use App\Http\Controllers\Admin\EvaBenController;

Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::prefix('Admin')->group(function () {
            Route::get('/', [adminController::class, 'homepage'])->name('admin');

            // Evaluate Beneficiary Information
            Route::get('Evaluating-Beneficiaries', [EvaBenController::class, 'showEvaBenlist'])->name('admin.evaluateBeneficiariesList');
            Route::get('Evaluating-Beneficiaries/{benID}', [EvaBenController::class, 'showevabeninfo'])->name('admin.evaluateBeneficiaryInfo');
            Route::get('Evaluating-Beneficiaries/{benID}/Download/{filename}', [EvaBenController::class, 'download'])->name('admin.downloadBenInfo');
            Route::post('Evaluating-Beneficiaries/Acceptance/{benID}', [EvaBenController::class, 'acceptance'])->name('admin.evaluateBeneficiaryAction');

            // Manage User Information Controller
            Route::get('Manage-User-Information', [ManageUserInformationController::class, 'page'])->name('Manage-User-Information');
            Route::get('View-User-Information/{id}', [ManageUserInformationController::class, 'viewUserInformation'])->name('View-User-Information');
            Route::get('Update-User-Information/{id}', [ManageUserInformationController::class, 'updateUserInformation'])->name('Update-User-Information');
            Route::put('Update-User-Information/{id}', [ManageUserInformationController::class, 'updateUserInformationPost'])->name('Update-User-InformationPost');

            // Manage Transport Controller
            Route::get('Assign-Transport', [ManageTransportController::class, 'assignTransport'])->name('admin.assignTransport');
            Route::get('Manage-Transport/{id}', [ManageTransportController::class, 'transport'])->name('Manage-Transport');
            Route::get('Create-Transport', [ManageTransportController::class, 'createTransport'])->name('Create-Transport');
            Route::put('Create-Transport', [ManageTransportController::class, 'createTransportPost'])->name('Create-TransportPost');
            Route::get('Update-Transport', [ManageTransportController::class, 'updateTransport'])->defaults('id', 0)->name('Update-Transport');
            Route::get('Update-Transport/{id}', [ManageTransportController::class, 'updatingTransport'])->name('Updating-Transport');
            Route::put('Update-Transport/{id}', [ManageTransportController::class, 'updateTransportPost'])->name('Update-TransportPost');
            Route::get('Delete-Transport', [ManageTransportController::class, 'deleteTransport'])->name('Delete-Transport');
            Route::delete('Delete-Transport', [ManageTransportController::class, 'deleteTransportPost'])->name('Delete-TransportPost');
            Route::post('Assign-Transportation', [ManageTransportController::class, 'assignDrivers'])->name('assign.drivers');
            Route::get('View-Transport', [ManageTransportController::class, 'viewTransport'])->name('admin.view-transport');

            Route::get('Manage-Driver', [ManageTransportController::class, 'getDriver'])->name('Manage-Driver');
            Route::put('Manage-Driver', [ManageTransportController::class, 'createDriver'])->name('transport.driver.put');
            Route::patch('Manage-Driver', [ManageTransportController::class, 'updateDriver'])->name('transport.driver.patch');
            Route::delete('Manage-Driver', [ManageTransportController::class, 'deleteDriver'])->name('transport.driver.delete');
            Route::get('Current-Busy-Driver', [ManageTransportController::class, 'currentDriver'])->name('current-busy-driver');

            // Manage Activity Controller
            Route::get('Activity', [ManageActivity::class, 'page'])->name('Activity');
            Route::get('DeleteActivity', [ManageActivity::class, 'deleteActivity'])->name('activity.delete');
            Route::delete('Activity/{id}', [ManageActivity::class, 'destroyActivity'])->name('activity.destroy');
            Route::get('editActivity', [ManageActivity::class, 'editActivity'])->name('activity.edit')->defaults('id', 0);
            Route::get('editActivity/{id}', [ManageActivity::class, 'editActivity'])->name('activity.getedit');
            Route::put('editActivity/{id}', [ManageActivity::class, 'editActivityPost'])->name('activity.editPost');
            Route::get('addActivity', [ManageActivity::class, 'addActivity'])->name('addActivity');
            Route::post('addActivity', [ManageActivity::class, 'addActivityPost'])->name('addActivityPost');

            // Report Controller
            Route::get('/Report', [ReportController::class, 'showReportController'])->name('admin.report');
            Route::post('/Report/Generate', [ReportController::class, 'activityReport'])->name('admin.report.generate');

            // Evaluate Transport Controller
            Route::get('/Evaluate-Transport', [EvaluateTransportController::class, 'showEvaluateTransport'])->name('admin.evaluatePage');
            Route::get('/Evaluate-Transport/{id}', [EvaluateTransportController::class, 'showEvaluateTransportdetail'])->where('id', '[0-9]+')->name('admin.evaluateDetails');
            Route::post('/Evaluate-Transport/{id}/Update', [EvaluateTransportController::class, 'updateEvaluation'])->name('evaluateTransportUpdate');
        });
    });
});