<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\actorActivity;
use App\Models\BeneficiaryActivity;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;


class JoinActivitiesController extends Controller
{
    public function showJoinActivities()
    {
        dd(Auth::id());
        $activities = Activity::all();
        return view('beneficiaries.joinActivities', compact('activities'));
    }

    // public function volJoinActivities(Request $request, $activityID){

    //     // Check if the user already joined
    //     $exists = JoinedActivity::where('user_id', Auth::id())
    //         ->where('activity_id', $activityID)
    //         ->exists();

    //     if ($exists) {
    //         return redirect()->route('beneficiaries.joinActivitiesList')->with('error', 'You have already joined this activity.');
    //     }

    //     // Insert into database
    //     JoinedActivity::create([
    //         'user_id' => Auth::id(),
    //         'activity_id' => $request->activity_id,
    //     ]);

    //     return redirect()->route('beneficiaries.joinActivitiesList')->with('success', 'Activity joined successfully!');
    // }

    public function benJoinActivities(Request $request, $activityID)
    {
        // Check if the user already joined
        $user = Auth::user()->actor->beneficiary;
        $benID = $user->benID;
        $exists = BeneficiaryActivity::where('benID', $benID)
        ->where('activityID', $activityID)
        ->exists();
        
        if ($exists) {
            return redirect()->route('beneficiaries')->with('error', 'You have already joined this activity.');
        }
        
        // Insert into database
        $user = BeneficiaryActivity::create([
            'benID' => $benID,
            'activityID' => $activityID,
        ]);

        return redirect()->route('beneficiaries')->with('success', 'Activity joined successfully!');

    }


    public function showBenJoinActivitiesList()
    {
        $user = Auth::user()->actor->beneficiary;
        $benID = $user->benID;
        $currentActivity = BeneficiaryActivity::where('benID', $benID)
            ->whereHas('activity', function($query) {
                $query->where('dateEnd', '>=', now());
            })
            ->with('activity')
            ->get();
        $pastActivity = BeneficiaryActivity::where('benID', $benID)
            ->whereHas('activity', function($query) {
                $query->where('dateEnd', '<', now());
            })
            ->with('activity')
            ->get();
        return view('beneficiaries.joinActivitiesList', compact('currentActivity', 'pastActivity'));
    }

    public function benCancelJoinActivity(Request $request)
    {
        $user = Auth::user()->actor->beneficiary;
        $benID = $user->benID;
        $activityID = $request->activityID;

        // Find the activity the user wants to cancel
        $joinedActivity = BeneficiaryActivity::where('benID', $benID)
            ->where('activityID', $activityID)
            ->first();

        if (!$joinedActivity) {
            return redirect()->route('ben.joinActivitiesList')->with('error', 'You have not joined this activity.');
        }

        // Delete the joined activity
        $joinedActivity->delete();

        return redirect()->route('ben.joinActivitiesList')->with('success', 'Activity cancelled successfully!');
    }
}
