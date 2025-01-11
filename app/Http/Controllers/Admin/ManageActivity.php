<?php
// Manage Activity Controller
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\AddActivityRequests;
use App\Models\Activity;
class ManageActivity extends Controller
{
    public function page()
    {
        $allActivity = Activity::all();
        return view('admin.ManageActivity.Activity', compact('allActivity'));
    }

    public function addActivity()
    {
        return view('admin.ManageActivity.addActivity');
    }

    public function deleteActivity()
    {
        $allActivity = Activity::all();
        return view('admin.ManageActivity.deleteActivity', compact('allActivity'));
    }

    public function addActivityPost(AddActivityRequests $request)
    {
        // dd($request->all());
        $activity = new Activity();
        $activity->activityName = $request->activityName;
        $activity->activityPlace = $request->activityPlace;
        $activity->dateStart = $request->dateStart;
        $activity->dateEnd = $request->dateEnd;
        $activity->timeStart = $request->timeStart;
        $activity->timeEnd = $request->timeEnd;
        $activity->volunteerCount = $request->volunteerCount;
        $activity->beneficiaryCount = $request->beneficiaryCount;
        $activity->activityDescription = $request->activityDescription;

        // Handle file upload for activityImage
        if ($request->hasFile('activityImage')) {
            $file = $request->file('activityImage');
            $filename = time() . '.' . $file->getClientOriginalExtension(); // Use epoch time for unique filename
            $path = $file->storeAs('activity_images', $filename, 'public');
            $activity->activityImage = $path;
        }

        $activity->save();

        return redirect()->route('addActivity')->with('success', 'Activity added successfully!');
    }

    public function destroyActivity(Request $request, $id)
    {
        // dd($);
        $activity = Activity::where('activityID', $id)->first();
        if ($activity) {
            $activity->delete();
            return redirect()->route('Activity')->with('success', 'Activity deleted successfully!');
        }
        return redirect()->route('Activity')->with('error', 'Activity not found!');
    }   

    public function editActivity($id)
    {
        // dd($id);
        if($id == 0){
            $allActivity = Activity::all();
            return view('admin.ManageActivity.editActivity', compact('allActivity'));
        }
        $activity = Activity::where('activityID', $id)->first();
        
        return view('admin.ManageActivity.editingActivity', ['activity' => $activity]);
    }

    public function editActivityPost(AddActivityRequests $request, $id)
    {
        $activity = Activity::where('activityID', $id)->first();
        // dd($activity->activityName);
        $activity->activityName = $request->activityName;
        $activity->activityPlace = $request->activityPlace;
        $activity->dateStart = $request->dateStart;
        $activity->dateEnd = $request->dateEnd;
        $activity->timeStart = $request->timeStart;
        $activity->timeEnd = $request->timeEnd;
        $activity->volunteerCount = $request->volunteerCount;
        $activity->beneficiaryCount = $request->beneficiaryCount;
        $activity->activityDescription = $request->activityDescription; 
        if ($request->hasFile('activityImage')) {
            $file = $request->file('activityImage');
            $filename = time() . '.' . $file->getClientOriginalExtension(); // Use epoch time for unique filename
            $path = $file->storeAs('activity_images', $filename, 'public');
            $activity->activityImage = $path;
        }   
        $activity->save();  
        return redirect()->route('activity.getedit', ['id' => $id])->with('success', 'Activity updated successfully!');
    }
}
