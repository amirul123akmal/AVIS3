<?php

namespace App\Http\Controllers\Volunteers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use App\Models\actorActivity;

class volunteerController extends Controller
{
    public function homepage()
    {
        $user = Auth::user()->actor;
        $activities = Activity::whereNotIn('activityID', actorActivity::where('actorID', $user->actorID)->pluck('activityID'))->get();
        $activities = $activities->filter(function($activity) {
            return strtotime($activity->dateStart) > time();
        });
        return view('volunteers.homepage', compact('activities'));
    }
}
