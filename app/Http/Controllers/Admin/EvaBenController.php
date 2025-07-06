<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Beneficiary;
use App\Models\RequestBeneficiary;
use ZipArchive;
use App\Models\IncomeGroup;



class EvaBenController extends Controller
{
    // Show the Evaluate Beneficiary List
    public function showEvaBenlist()
    {

        $beneficiaries = Beneficiary::where('statusID', 5)->orWhereNull("incomeGroupID")
            // ->with('requestBeneficiary') // Assuming a relationship is defined in the Beneficiary model
            ->get();
        // dd($beneficiaries[0]->actor->fullname);
        return view('admin.EvaBenInfo.EvaBenInfoList', compact('beneficiaries'));
    }

    // Show the Beneficiary Application page
    public function showevabeninfo($benID)
    {
        $beneficiary = Beneficiary::with(['actor', 'requestBeneficiary', 'status'])->findOrFail($benID);
        $incomegrp = IncomeGroup::allCached();
        return view('admin.EvaBenInfo.EvaluateBeneficiariesInformation', compact('beneficiary', 'incomegrp'));
    }

    // Function to download beneficiary information
    public function download($benID, $filename)
    {
        $beneficiary = Beneficiary::with('actor')->findOrFail($benID);
        $filenames = explode(',', $filename); // Split the filename by comma

        if (count($filenames) === 1) {
            $filePath = storage_path('app/private/uploads/' . trim($filenames[0])); // Trim whitespace
            if (file_exists($filePath)) {
                return response()->download($filePath);
            } else {
                return redirect()->back()->with('error', 'File not found: ' . trim($filenames[0]));
            }
        }

        $zip = new ZipArchive();
        $zipFileName = storage_path('app/private/uploads/beneficiary_' . $benID . '_documents.zip');

        if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== TRUE) {
            return redirect()->back()->with('error', 'Could not create zip file.');
        }

        foreach ($filenames as $file) {
            $filePath = storage_path('app/private/uploads/' . trim($file)); // Trim whitespace

            if (file_exists($filePath)) {
                $zip->addFile($filePath, trim($file));
            } else {
                return redirect()->back()->with('error', 'File not found: ' . trim($file));
            }
        }

        $zip->close();

        return response()->download($zipFileName)->deleteFileAfterSend(true);
    }

    // Function to handle acceptance of a beneficiary
    public function acceptance(Request $request, $benID)
    {

        $validatedData = $request->validate([
            'action' => ['required', 'string', 'in:approve,reject'],
            'incomeGroup' => ['required', 'integer', 'exists:incomegroup,incomeGroupID'],
        ]);

        if ($validatedData['action'] === 'approve') {
            $beneficiary = Beneficiary::with('requestBeneficiary')->findOrFail($benID);

            if (is_null($beneficiary->requestBeneficiary?->incomeDocument) || is_null($beneficiary->requestBeneficiary?->asnafCardDocument)) {
                return redirect()->back()->withErrors(['error' => "The beneficiary has not completed the application."]);
            }

            // Update the status of the beneficiary based on the action
            $beneficiary->statusID = $request->action === 'approve' ? 3 : 4;
            $beneficiary->incomeGroupID = $request->incomeGroup;
            $beneficiary->save();
        }
        return redirect()->route('admin.evaluateBeneficiariesList')->with('success', 'Beneficiary updated successfully.');
    }
}
