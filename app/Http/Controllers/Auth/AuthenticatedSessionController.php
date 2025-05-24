<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();


        $loggedInUserRole = $request->user()->role;
        
        if($loggedInUserRole == 0)
        {
            return redirect()->intended(route('administrator.dashboard', absolute:false));
        }
        else if($loggedInUserRole == 1)
        {
            return redirect()->intended(route('seksi.dashboard', absolute:false));
        }
        else if($loggedInUserRole == 2)
        {
            return redirect()->intended(route('subseksi.dashboard', absolute:false));
        }
        else if($loggedInUserRole == 3)
        {
            return redirect()->intended(route('keuangan.dashboard', absolute:false));
        }
        else if($loggedInUserRole == 4)
        {
            return redirect()->intended(route('litbang.dashboard', absolute:false));
        }
        else if($loggedInUserRole == 5)
        {
            return redirect()->intended(route('sekretaris.dashboard', absolute:false));
        }

        return redirect()->intended(route('dashboard', absolute:false));

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
