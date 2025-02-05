<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Actor;
use App\Models\User;
use App\Models\State;
use Livewire\Livewire;
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
        $user = Actor::with('login')->find($id);
        $states = State::allCached();
        return view('admin.ManageUserInformation.ViewUserInformation', compact('user', 'states'));
    }

    public function updateUserInformation($id)
    {
        $user = Actor::with('login')->find($id);
        $states = State::allCached();
        return view('admin.ManageUserInformation.UpdateUserInformation', compact('user', 'states'));
    }

    public function updateUserInformationPost(Request $request, $id)
    {
        // dd(Rule::unique(User::class)->ignore(User::find($id)->loginID, 'loginID'));

        $validatedData = $request->validate([
            'ic_number' => ['required', 'string', 'max:255', 'regex:/^[0-9]*$/', 
                            Rule::unique(Actor::class, 'ic')->ignore(Actor::find($id)->ic, 'ic')],
            'username' => ['required', 'string', 'max:255'],
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
        ]);
        // dd($validatedData);
        $user = User::find($id);
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->save();
        
        $actor = Actor::find($id);
        $actor->ic = $validatedData['ic_number'];
        $actor->phoneNumber = $validatedData['phone_number'];
        $actor->save();

        $address = Address::find($id);
        $address->postcode = $validatedData['postcode'];
        $address->stateID = $validatedData['state'];
        $address->road = $validatedData['address'];
        $address->save();

        return redirect()->route('View-User-Information', ['id' => $id])->with('success', 'profile-updated');
    }
}
