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

    public function volJoinActivities(Request $request, $activityID)
    {
        $exists = actorActivity::where('actorID', Auth::id())
            ->where('activityID', $activityID)
            ->exists();

        if ($exists) {
            return redirect()->route('vol.joinedActivities')->withErrors(['error' => 'You have already joined this activity.']);
        }

        $activity = Activity::findOrFail($activityID);
        $currentVolunteerCount = actorActivity::where('activityID', $activityID)->count();

        if ($currentVolunteerCount >= $activity->volunteerCount) {
            return redirect()->route('vol.homepage')->withErrors(['error' => 'This activity has reached its maximum number of volunteers.']);
        }

        $joinedActivities = actorActivity::where('actorID', Auth::id())->pluck('activityID')->toArray();
        $clashingActivities = Activity::whereIn('activityID', $joinedActivities)
            ->where('dateStart', '<=', $activity->dateEnd)
            ->where('dateEnd', '>=', $activity->dateStart)
            ->exists();

        if ($clashingActivities) {
            return redirect()->route('vol.homepage')->withErrors(['error' => 'You cannot join this activity as it clashes with an activity you have already joined.']);
        }

        $activityStartTime = strtotime($activity->dateStart);
        $currentTime = time();
        $timeDifference = $activityStartTime - $currentTime;

        // Check if the activity starts in less than 24 hours
        if ($timeDifference < 86400) { // 86400 seconds in 24 hours
            return redirect()->route('vol.homepage')->withErrors(['error' => 'You cannot join this activity as it starts in less than 24 hours.']);
        }

        actorActivity::create([
            'actorID' => Auth::id(),
            'activityID' => $activityID,
        ]);

        return redirect()->route('vol.joinedActivities')->with('success', 'Activity joined successfully!');
    }

    public function benJoinActivities(Request $request, $activityID)
    {
        // Check if the user already joined
        $user = Auth::user()->actor->beneficiary;
        $benID = $user->benID;
        $exists = BeneficiaryActivity::where('benID', $benID)
        ->where('activityID', $activityID)
        ->exists();
        
        if ($exists) {
            return redirect()->route('beneficiaries')->withErrors(['error' => 'You have already joined this activity.']);
        }

        // Check the current beneficiary count for the activity
        $activity = Activity::findOrFail($activityID);
        $currentBeneficiaryCount = BeneficiaryActivity::where('activityID', $activityID)->count();

        if ($currentBeneficiaryCount >= $activity->beneficiaryCount) {
            return redirect()->route('beneficiaries')->withErrors(['error' => 'This activity has reached its maximum number of beneficiaries.']);
        }

        $joinedActivities = BeneficiaryActivity::where('benID', $benID)->pluck('activityID')->toArray();
        $clashingActivities = Activity::whereIn('activityID', $joinedActivities)
            ->where('dateStart', '<=', $activity->dateEnd)
            ->where('dateEnd', '>=', $activity->dateStart)
            ->exists();

        if ($clashingActivities) {
            return redirect()->route('beneficiaries')->withErrors(['error' => 'You cannot join this activity as it clashes with an activity you have already joined.']);
        }

        $activityStartTime = strtotime($activity->dateStart);
        $currentTime = time();
        $timeDifference = $activityStartTime - $currentTime;

        // Check if the activity starts in less than 24 hours
        if ($timeDifference < 86400) { // 86400 seconds in 24 hours
            return redirect()->route('beneficiaries')->withErrors(['error' => 'You cannot join this activity as it starts in less than 24 hours.']);
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

    public function showVolJoinActivitiesList()
    {
        $actorID = Auth::user()->actor->actorID;
        $currentActivity = actorActivity::where('actorID', $actorID)
            ->whereHas('activity', function($query) {
                $query->where('dateEnd', '>=', now());
            })
            ->with('activity')
            ->get();
        $pastActivity = actorActivity::where('actorID', $actorID)
            ->whereHas('activity', function($query) {
                $query->where('dateEnd', '<', now());
            })
            ->with('activity')
            ->get();
        return view('volunteers.joinActivitiesList', compact('currentActivity', 'pastActivity'));
    }

    public function volCancelJoinActivity(Request $request, $activityID)
    {
        $user = Auth::user()->actor;
        $actorID = $user->actorID; 

        // Find the activity the volunteer wants to cancel
        $joinedActivity = actorActivity::where('actorID', $actorID)
            ->where('activityID', $activityID)
            ->first();

        if (!$joinedActivity) {
            return redirect()->route('vol.joinedActivities')->with('error', 'You have not joined this activity.');
        }

        // Handle the cancellation logic
        try {
            // Delete the joined activity
            $joinedActivity->delete();
            return redirect()->route('vol.joinedActivities')->with('success', 'Activity cancelled successfully!');
        } catch (\Exception $e) {
            return redirect()->route('vol.joinedActivities')->with('error', 'An error occurred while cancelling the activity. Please try again.');
        }
    }
}
