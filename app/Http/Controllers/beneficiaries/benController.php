<?php

namespace App\Http\Controllers\beneficiaries;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use App\Models\Status;
use App\Models\RequestBeneficiary;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class benController extends Controller
{
    public function homepage(Request $request, $reapply = 'false'): View|RedirectResponse
    {
        $user = auth()->user()->actor->beneficiary;
        $ben = RequestBeneficiary::where('benID', $user->benID)->exists();
        if (!$ben) {
            RequestBeneficiary::create([
                'benID' => $user->benID
            ]);
        }
        if ($user->status->statusType == "Not Approved" || $reapply == 'true') {
            return redirect('complete-documents');
        }
        if ($user->status->statusType == 'Pending') {
            return view('beneficiaries.waitingForApprove');
        }

        return view('beneficiaries.homepage');
    }

    public function getDocuments(Request $request): View
    {
        $names = ['Income Document', 'Asnaf Document', 'Support Document (Support Multiple File)'];
        $types = ['incomeDocument', 'asnafCardDocument', 'supportDocument'];
        return view('beneficiaries.sendDocument', ['names' => $names, 'types' => $types]);
    }

    public function storingDocument(Request $request)
    {
        // Validate the request
        $validator = Validator::make(
            $request->all(),
            [
                'numOfDependents' => ['required', 'integer', 'min:0'],
            ],
            [],
            [
                'numOfDependents' => "Number Of Dependents"
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(), // Return validation errors
            ], 422); // 422 Unprocessable Entity for validation errors
        }

        $user = auth()->user()->actor->beneficiary;
        $user->requestBeneficiary->update([
            'numDependents' => $request->numOfDependents,
        ]);


        // Check for required documents
        $req = auth()->user()->actor->beneficiary->requestBeneficiary;

        if ($req->incomeDocument == null) {
            return response()->json([
                'status' => 'redirect',
                'url' => url('complete-documents'),
                'message' => 'Please fill in the document',
            ], 302); // 302 status for redirection
        }

        $user->update(['statusID' => Status::where('statusType', 'Pending')->value('statusID')]);

        // Return success response
        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'Document stored successfully',
        // ]);


        return response()->json([
            'status' => 'redirect',
            'url' => 'beneficiaries',
        ]);
    }
}