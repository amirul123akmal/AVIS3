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
        $loginData = Arr::only($request->validated(), ['username', 'email']);
        $addressData = Arr::only($request->validated(), ['address', 'postcode', 'state']); 
        $actorData = Arr::only($request->validated(), ['ic_number', 'phone_number']);
        // dd($loginData, $addressData, $actorData);
        $request->user()->fill($loginData);
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $actor = $request->user()->actor;
        $actor->ic = $actorData['ic_number'];
        $actor->phoneNumber = $actorData['phone_number'];

        $address = $actor->address;
        $address->postcode = $addressData['postcode'];
        $address->stateID = $addressData['state'];
        $address->road = $addressData['address'];

        $actor->save();
        $address->save();
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
