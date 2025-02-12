<?php

namespace App\Http\Controllers\beneficiaries;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\State;
use App\Models\RequestTransport;
use Illuminate\Support\Facades\Validator;

class reqTransportController extends Controller
{
   public function showreqTransportController()
   {
      $actor = Auth::user()->actor;
      $states = State::allCached();
      return view('beneficiaries.reqTransport', compact('actor', 'states'));
   }
   public function showreqTransportStatus()
   {
      return view('beneficiaries.reqTransportStat');
   }

   public function applyReqTransport(Request $request)
   {
      // Validate the request
      $validator = Validator::make($request->all(), [
         'address_from' => 'required|string|max:255',
         'postcode_from' => 'required|string|max:10',
         'city_from' => 'required|string|max:100',
         'address_to' => 'required|string|max:255',
         'postcode_to' => 'required|string|max:10',
         'city_to' => 'required|string|max:100',
         'state_from' => 'required|exists:state,stateID', // Fixed to state_from
         'state_to' => 'required|exists:state,stateID',   // Fixed to state_to
         'notes' => 'nullable|string|max:500',
      ]);

      if ($validator->fails()) {
         return response()->json([
               'status' => 'error',
               'errors' => $validator->errors(),
         ], 422);
      }

      // Process the transport request (e.g., save to database)
      $transportRequest = new RequestTransport();
      $transportRequest->benID = Auth::user()->actor->beneficiary->benID; 
      $transportRequest->address_from = implode('] ', [
         $request->address_from,
         $request->postcode_from,
         $request->city_from,
         $request->state_from, // Include state_from
      ]);
      $transportRequest->address_to = implode('] ', [
         $request->address_to,
         $request->postcode_to,
         $request->city_to,
         $request->state_to, // Include state_to
      ]);
      $transportRequest->dateReq = now(); // Set the current date and time
      $transportRequest->notes = $request->notes;
      $transportRequest->status = 'Pending'; // Set the status to 'Pending'
      dd($transportRequest);
      $transportRequest->save();

      return response()->json([
         'status' => 'success',
         'message' => 'Transport request submitted successfully.',
      ]);
   }
}
