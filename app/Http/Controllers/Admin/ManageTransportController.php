<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transportation;
use App\Models\VehicleType;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\Admin\TransportationRequest;
class ManageTransportController extends Controller
{
    public function transport(): View
    {
        $transportation = Transportation::all();
        return view('admin.ManageTransport.ManageTransport', compact('transportation'));
    }

    public function createTransport(): View
    {
        $vehicleType = VehicleType::all();
        $status = Status::where('entityType', 'vehicleStatus')->get();
        return view('admin.ManageTransport.CreateTransport', compact('vehicleType', 'status'));
    }

    public function createTransportPost(TransportationRequest $request)
    {
        $transportation = new Transportation();
        $transportation->vehiclePlateNumber = $request->plateNumber;
        $transportation->vehicleID = $request->vehicleType;
        $transportation->driverID = null;
        $transportation->vehicleCapacity = $request->capacity;
        $transportation->vehicleDesc = $request->description;
        $transportation->vehicleStatus = $request->status;
        $transportation->save();
        return redirect()->route('Create-Transport')->with('success', 'Transportation created successfully');
    }   

    public function updateTransport(): View
    {
        $transportation = Transportation::all();
        return view('admin.ManageTransport.UpdateTransport', compact('transportation'));
    }

    public function updatingTransport($id)
    {
        $transportation = Transportation::find($id);    
        $vehicleType = VehicleType::all();
        $status = Status::where('entityType', 'vehicleStatus')->get();
        return view('admin.ManageTransport.UpdatingTransport', compact('transportation', 'vehicleType', 'status'));
    }

    public function updateTransportPost(TransportationRequest $request, $id)
    {
        $transportation = Transportation::find($id);
        $transportation->vehiclePlateNumber = $request->plateNumber;
        $transportation->vehicleID = $request->vehicleType;
        $transportation->vehicleCapacity = $request->capacity;
        $transportation->vehicleDesc = $request->description;
        $transportation->vehicleStatus = $request->status;
        $transportation->save();
        return redirect()->route('Update-Transport', ['id' => $id])->with('success', 'Transportation updated successfully');
    }

    public function deleteTransport()
    {
        $transportation = Transportation::all();
        return view('admin.ManageTransport.DeleteTransport', compact('transportation'));
    }

    public function deleteTransportPost()
    {
        $id = request()->query('id');
        $transportation = Transportation::find($id);
        $transportation->delete();
        return response()->json(['success' => true, 'message' => 'Transportation deleted successfully']);
    }
}
