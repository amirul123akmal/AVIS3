<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class EvaluateTransportController extends Controller
{
    //
    public function showEvaluateTransportController(){
        return view('admin.evaluateTransport');
    }

    public function showEvaluateTransportdetail($id){
        return view('admin.evaluateTransportView');
    }
}
