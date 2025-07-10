<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\RateLimiter;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
        $throttle_key = Str::lower($request->input("email")) . "|" . $request->ip();

        if (RateLimiter::tooManyAttempts($throttle_key, 3)) {
            $seconds = RateLimiter::availableIn($throttle_key);
            return back()->withErrors([
                'email' => "Too many login attempts. Please try again in $seconds seconds."
            ]);
        }

        $request->authenticate();
        $request->session()->regenerate();

        // Get the authenticated user's ID
        $userId = Auth::user()->loginID;
        $data = Actor::where('actorID', $userId)->with('status')->first();

        if($data->status->statusType === 'Disable')
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return back()->withErrors([
                'email' => "Your account is disabled."
            ]);
        }

        if ($data) {
            $user = Auth::user();
            $accounttype = $user->actor->accountType->accountType;
            return redirect()->route($accounttype === 'volunteers' ? 'vol.homepage' : $accounttype);
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
