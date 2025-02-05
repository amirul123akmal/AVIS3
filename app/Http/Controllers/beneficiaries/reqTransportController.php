<?php

namespace App\Http\Controllers\beneficiaries;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class reqTransportController extends Controller
{
    public function showreqTransportController()
    {
       return view('beneficiaries.reqTransport');
    }
    public function showreqTransportStatus()
    {
       return view('beneficiaries.reqTransportStat');
    }
}
