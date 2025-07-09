<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\RequestTransport;
use Illuminate\Http\Request;

class EvaluateTransportController extends Controller
{
    public function showEvaluateTransport()
    {
        // Fetch only pending transport requests
        $requestsToEvaluate = RequestTransport::join('beneficiary', 'requesttransport.benID', '=', 'beneficiary.benID')
            ->join('actor', 'beneficiary.actorID', '=', 'actor.actorID')
            ->select('requesttransport.*', 'actor.fullname')
            ->where('requesttransport.status', 'Pending')
            ->orWhereNull('requesttransport.status')
            ->get();
        // Fetch only evaluated transport requests (approved/rejected)
        $evaluatedRequests = RequestTransport::join('beneficiary', 'requesttransport.benID', '=', 'beneficiary.benID')
            ->join('actor', 'beneficiary.actorID', '=', 'actor.actorID')
            ->select('requesttransport.*', 'actor.fullname')
            ->whereIn('status', ['Approved', 'Rejected'])
            ->orWhereNull('requesttransport.status')
            ->get();

        return view('admin.EvaluateTransport.evaluateTransport', compact('requestsToEvaluate', 'evaluatedRequests'));
    }

    public function showEvaluateTransportDetail($id)
    {
        // Fetch transport request with related data
        $transportRequest = RequestTransport::with([
            'beneficiary', 
            'beneficiary.incomeGroup', 
            'vehicleType'
        ])->find($id);

        if (!$transportRequest) {
            return abort(404, 'Transport request not found.');
        }
        $addressFrom = str_replace(']', ',', $transportRequest->addressFrom);
        $addressTo = str_replace(']', ',', $transportRequest->addressTo);
        // dd($transportRequest, $addressFrom, $addressTo);

        return view('admin.EvaluateTransport.evaluateTransportView', compact('transportRequest','addressFrom','addressTo'));
    }

    public function updateEvaluation(Request $request, $id)
    {
        // dd($request->request);
        $request->validate([
            'status' => 'required|string|in:Pending,Approved,Rejected',
            "transport_price" => "nullable|numeric|min:0|max:1000",
            'notes' => ['required', 'regex:/^[a-z A-Z0-9\s]*$/'],
        ]);

        $transportRequest = RequestTransport::find($id);

        if (!$transportRequest) {
            return abort(404, 'Transport request not found.');
        }
        $notes_storage = $request->transport_price !== null 
            ? $request->notes . ']' . $request->transport_price 
            : $request->notes;

        $transportRequest->update([
            'status' => $request->status,
            'notes' => $notes_storage
        ]);

        return redirect()->route('admin.evaluateDetails', ['id' => $id])->with('success', 'Transport request updated successfully!');
    }
}
