<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transportation;
use App\Models\VehicleType;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\Admin\TransportationRequest;
use App\Models\Driver;
use App\Models\RequestTransport;
use App\Models\TransportAssign;

class ManageTransportController extends Controller
{
    public function transport($id): View
    {
        $data = RequestTransport::find($id);
        $transportation = Transportation::all();
        $driver = Driver::all();
        $vehicletype = VehicleType::all();
        $addressFrom = str_replace(']', ',', $data->addressFrom);
        $addressTo = str_replace(']', ',', $data->addressTo);
        // dd($addressFrom, $addressTo);
        $busyDrivers = [];
        $busyVehicle = [];
        $currentDate = now()->toDateString();
        foreach ($driver as $drv) {
            $assignedTransport = Driver::join('transportation', 'driver.driverID', '=', 'transportation.driverID')
            ->join('transportassign', 'transportation.transID', '=', 'transportassign.transID')
            ->join('requesttransport', 'transportassign.reqID', '=', 'requesttransport.reqID')
            ->where('requesttransport.dateReq', '>=', $currentDate)
            ->where('driver.driverID', $drv->driverID)
            ->first();
            
            // if( $drv->driverID === 3)
            // dd($assignedTransport?? 'a');
            if($assignedTransport)
            {
                $busyVehicle[$assignedTransport->transID] = $assignedTransport["vehiclePlateNumber"];
            }
            $busyDrivers[$drv->driverID] = [
                'status' => $assignedTransport ? 'unavailable' : 'available',
                'driverName' => $drv->driverName,
                'driverID' => $drv->driverID,
            ];
        }
        // dd($busyVehicle);
        return view('admin.ManageTransport.ManageTransport', compact('data', 'transportation', 'busyDrivers', 'busyVehicle', 'vehicletype', 'id', 'addressFrom', 'addressTo'));
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

    public function viewTransport()
    {
        $transportation = Transportation::all();
        $driver = Driver::all();
        $vehicletype = VehicleType::all();
        
        return view('admin.ManageTransport.viewTransport', compact('transportation','driver','vehicletype'));
    }

    public function assignDrivers(Request $request)
    {
        $validatedData = $request->validate([
            'transportation' => 'required|exists:transportation,transID',
            'drivers' => 'required|exists:driver,driverID',
            'reqID' => 'required|exists:requesttransport,reqID',
        ]);
        
        // dd($validatedData);
        $transportation = Transportation::find($validatedData['transportation']);
        $transportation->driverID = $validatedData['drivers'];
        $transportation->save();

        $transportAssign = new TransportAssign();
        $transportAssign->transID = $validatedData['transportation'];
        $transportAssign->reqID = $validatedData['reqID'];
        $transportAssign->save();

        return redirect()->route('current-busy-driver')->with('success', 'Driver assigned successfully');
    }

    public function getDriver()
    {
        $drivers = Driver::all();
        return view('admin.ManageTransport.ManageDriver', compact('drivers'));
    }

    public function createDriver(Request $request)
    {
        $validatedData = $request->validate([
            'driverName' => 'required|string|max:255',
            'driverPhoneNum' => 'required|regex:/^[0-9]+$/|max:15',
        ]);

        $driver = new Driver();
        $driver->driverName = $validatedData['driverName'];
        $driver->driverPhoneNum = $validatedData['driverPhoneNum'];
        $driver->save();

        return redirect()->route('Manage-Driver')->with('success', 'Driver created successfully');
    }

    public function updateDriver(){

    }

    public function currentDriver()
    {
        $currentDate = now()->toDateString();

        $assignedTransport = Driver::join('transportation', 'driver.driverID', '=', 'transportation.driverID')
            ->join('transportassign', 'transportation.transID', '=', 'transportassign.transID')
            ->join('requesttransport', 'transportassign.reqID', '=', 'requesttransport.reqID')
            ->join('beneficiary', 'beneficiary.benID', '=', 'requesttransport.benID')
            ->join('actor', 'beneficiary.actorID', '=', 'actor.actorID')
            ->join('login', 'actor.actorID', '=', 'login.loginID') // Join with login to retrieve email
            ->where('requesttransport.dateReq', '>=', $currentDate)->get();
            // dd($assignedTransport);
        return view('admin.ManageTransport.busyDriver', compact('assignedTransport'));
    }
}
