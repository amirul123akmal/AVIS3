<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ActorRequest;
use App\Http\Requests\Auth\ValidTlds;
use App\Models\AccountType;
use App\Models\Actor;
use App\Models\Beneficiary;
use App\Models\User;
use App\Models\State;
use App\Models\Address;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Http\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('guest.register');
    }

    public function getChoose(Request $request): View|Response
    {
        return view('guest.chooseType');
    }

    public function manageChoose(Request $request, $type): RedirectResponse
    {
        $id = DB::table('accounttype')->where('accountType', $type)->get('accountID');
        // dd($id->toArray());
        session(['accountID' => $id->toArray()[0]->accountID]);
        return redirect('/complete-profile');
    }

    public function completeProfile(Request $request): View
    {
        $states = State::all();
        // dd($states->toArray());
        return view('guest.fullRegister', ['states' => $states->toArray()]);
    }

    public function storeProfile(ActorRequest $request)
    {
        $validatedData = $request->validated();
        $address = Address::create([
            'road' => $validatedData['address'],
            'postcode' => $validatedData['postcode'],
            'stateID' => $validatedData['stateID'],
        ]);
        Actor::create([
            'actorID' => Auth::user()->loginID,
            'fullname' => $validatedData['fullname'],
            'ic' => $validatedData['icnum'],
            'phoneNumber' => $validatedData['phoneNumber'],
            'accountID' => session('accountID'),
            'addressID' => $address->addressID
        ]);
        if (AccountType::where('accountID', session('accountID'))->value('accountType') == 'beneficiaries') {
            Beneficiary::create([
                'actorID' => Auth::user()->loginID
            ]);
        }

        return redirect('/login');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:100', "regex:/^[a-z A-Z`']*$/"],
            'lastname' => ['required', 'string', 'max:100', "regex:/^[a-z A-Z`']*$/"],
            'email' => ['required', 'string', 'lowercase', 'email', new ValidTlds, 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', 'string', 'min:8', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*?&]/'],
        ]);

        $user = User::create([
            'username' => $request->firstname . ' ' . $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/choose');
    }
}
