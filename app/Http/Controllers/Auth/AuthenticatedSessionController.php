<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Response;
use App\Models\Actor;
use Illuminate\Support\Facades\Log;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View|RedirectResponse
    {
        // if (!auth()->check())
        return view('guest.login');
        // return redirect('/admin');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        // Get the authenticated user's ID
        $userId = Auth::user()->loginID;
        // Log::info('Authenticated User ID: ' . $userId);
        $data = Actor::where('actorID', $userId)->exists();
        // dd($data);
        // Check if data exist in the actor
        // if this is true, this means the registration progress of the user is not completed.
        if ($data) {
            $user = Auth::user();
            $accounttype = $user->actor->accountType->accountType;
            return redirect()->route($accounttype);
        } else {
            return redirect()->intended('/choose');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        session()->flush();

        return redirect('/');
    }
}
