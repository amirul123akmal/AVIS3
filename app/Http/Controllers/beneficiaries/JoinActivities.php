<?php

namespace App\Http\Controllers\beneficiaries;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JoinActivities extends Controller
{
    public function showJoinActivities()
    {
        return view('beneficiaries.joinActivities');
    }
    public function showJoinActivitiesList()
    {
        return view('beneficiaries.joinActivitiesList');
    }
}
