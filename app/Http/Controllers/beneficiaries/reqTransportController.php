<?php

namespace App\Http\Controllers\beneficiaries;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\State;
use App\Models\RequestTransport;
use Illuminate\Support\Facades\Validator;
use App\Models\VehicleType;

class reqTransportController extends Controller
{
   public function showreqTransportController()
   {
      $actor = Auth::user()->actor;
      $states = State::allCached();
      $vehicletype = VehicleType::all();
      $benID = $actor->beneficiary->benID;
      $pendingRequest = RequestTransport::where('benID', $benID)
          ->whereDate('dateReq', '>=', now()->toDateString())
          ->first();

      if ($pendingRequest) {
          return view('beneficiaries.reqTransportStatWait', compact('actor', 'pendingRequest'));
      }
      return view('beneficiaries.reqTransport', compact('actor', 'states', 'vehicletype'));
   }
   public function showreqTransportStatus()
   {
      return view('beneficiaries.reqTransportStat');
   }

   public function applyReqTransport(Request $request)
   {
      // dd($request->all());
      // Validate the request
      $request->validate([
         'address_from' => 'required|string|max:255|regex:/^[a-zA-Z0-9\s]+$/',
         'address_to' => 'required|string|max:255|different:address_from|regex:/^[a-zA-Z0-9\s]+$/',
         'postcode_from' => 'required|regex:/^\d{5}$/',
         'postcode_to' => 'required|regex:/^\d{5}$/',
         'city_from' => 'required|string|max:100|regex:/^[a-zA-Z]+$/',
         'city_to' => 'required|string|max:100|regex:/^[a-zA-Z]+$/',
         'state_from' => 'required|exists:state,stateID',
         'state_to' => 'required|exists:state,stateID',
         'vehicle_type' => 'required|exists:vehicletype,vehicleID',
         'notes' => 'nullable|string|max:500',
      ]);

      // Process the transport request (e.g., save to database)
      $transportRequest = new RequestTransport();
      $transportRequest->benID = Auth::user()->actor->beneficiary->benID; 
      $transportRequest->addressFrom = implode('] ', [
         $request->address_from,
         $request->postcode_from,
         $request->city_from,
         $request->state_from, // Include state_from
      ]);
      $transportRequest->addressTo = implode('] ', [
         $request->address_to,
         $request->postcode_to,
         $request->city_to,
         $request->state_to, // Include state_to
      ]);
      $transportRequest->vehicleID = $request->vehicle_type; // Include vehicleID
      $transportRequest->dateReq = now(); // Set the current date and time
      $transportRequest->notes = $request->notes;
      $transportRequest->status = 'Pending'; // Set the status to 'Pending'
      $transportRequest->save();

      return redirect()->route('ben.reqTransport')->with('success', 'Transport request submitted successfully.');
   }
}
