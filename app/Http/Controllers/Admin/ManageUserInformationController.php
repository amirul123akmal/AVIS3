<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Actor;
use App\Models\User;
use App\Models\State;
use Livewire\Livewire;
use App\Models\IncomeGroup;
use Illuminate\Validation\Rule;
use App\Models\Address;
class ManageUserInformationController extends Controller
{
    public function page()
    {
        return view('admin.ManageUserInformation.ManageUserInformation');
    }

    public function viewUserInformation($id)
    {
        $user = Actor::with(['login'])->find($id);
        $states = State::allCached();
        return view('admin.ManageUserInformation.ViewUserInformation', compact('user', 'states'));
    }

    public function updateUserInformation($id)
    {
        $user = Actor::with('login')->find($id);
        $states = State::allCached();
        $incomeGroup = IncomeGroup::allCached();
        return view('admin.ManageUserInformation.UpdateUserInformation', compact('user', 'states', 'incomeGroup'));
    }

    public function updateUserInformationPost(Request $request, $id)
    {
        $validatedData = $request->validate([
            'ic_number' => ['required', 'string', 'max:255', 'regex:/^[0-9]*$/', 
                            Rule::unique(Actor::class, 'ic')->ignore(Actor::find($id)->ic, 'ic')],
            'username' => ['required', 'string', 'max:255'],
            'full_name' => ['required', 'string', 'max:255'], // Added validation for full_name
            'phone_number' => ['required', 'string', 'max:255', 'regex:/^[0-9]*$/'],
            'address' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:255', 'regex:/^[0-9]*$/'],
            'state' => ['required', 'integer', 'exists:state,stateID'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore(User::find($id)->loginID, 'loginID'),
            ],
            'income_group' => [
                'nullable', // Make income_group optional
                'integer', 
                'exists:incomegroup,incomeGroupID'
            ], // Added validation for income_group
        ]);
        
        $user = User::find($id);
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->save();
        
        $actor = Actor::find($id);
        $actor->ic = $validatedData['ic_number'];
        $actor->phoneNumber = $validatedData['phone_number'];
        $actor->fullname = $validatedData['full_name']; // Save full name
        $actor->save();

        $address = Address::find($actor->addressID);
        $address->postcode = $validatedData['postcode'];
        $address->stateID = $validatedData['state'];
        $address->road = $validatedData['address'];
        $address->save();

        // Update the income group only if it is provided
        if (isset($validatedData['income_group'])) {
            $beneficiary = $actor->beneficiary; // Assuming there's a relationship defined
            $beneficiary->incomeGroupID = $validatedData['income_group'];
            $beneficiary->save();
        }

        return redirect()->route('View-User-Information', ['id' => $id])->with('success', 'profile-updated');
    }
}
