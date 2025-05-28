<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\State;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;

class ManageAccountController extends Controller
{
    public function edit(Request $request): View
    {
        $states = State::allCached();
        return view('common.profile', [
            'user' => $request->user(),
            'states' => $states,
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // dd($request->has('action'));
        if($request->has('action')){
            $user = Auth::user();
            $user->actor->statusID = 2;
            $user->actor->save();

            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return Redirect::to('/');
        }
        $loginData = Arr::only($request->validated(), ['username', 'email']);
        $addressData = Arr::only($request->validated(), ['address', 'postcode', 'state']); 
        $actorData = Arr::only($request->validated(), ['ic_number', 'phone_number', 'full_name']); // Added fullname to actorData
        // dd($loginData, $addressData, $actorData);
        $request->user()->fill($loginData);
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $actor = $request->user()->actor;
        $actor->ic = $actorData['ic_number'];
        $actor->phoneNumber = $actorData['phone_number'];
        $actor->fullname = $actorData['full_name']; // Update the full name

        $address = $actor->address;
        $address->postcode = $addressData['postcode'];
        $address->stateID = $addressData['state'];
        $address->road = $addressData['address'];

        $actor->save();
        $address->save();
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'Profile Updated Successfully');
    }

    public function destroy(Request $request): RedirectResponse
    {
        // dd($request->all());

        $user = Auth::user();
        dd($user);
        $actor = $user->actor;
        $address = $actor->address;

        $actor->delete();
        $address->delete();

        // Then delete the actor

        // Finally, delete the user
        $user->delete();

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
