<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test\SendEmail;
use App\Mail\TestEmail;

Route::view('/amirul', 'homepage');
Route::view('/amirul2', 'beneficiaries.reqTransportStat');

Route::view('/testtt', 'admin.Report.activityReport');

Route::get('/sendje/{to}/{message}', [SendEmail::class, 'sendMail']);