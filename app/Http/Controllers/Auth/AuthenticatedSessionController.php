<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
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
        
        $user = $request->user();
        // dd($user);
        // Store specific user data in the session
        $userData = [
            'name' => $user->name,
            'email' => $user->email,
            'photo' => $user->photo
        ];

        $request->session()->put('user_data', $userData);

        $url = '';
        $role = $user->role;
        if ($role === 'admin') { $url = 'admin/dashboard'; }
        if ($role === 'agent') { $url = 'agent/dashboard'; }
        if ($role === 'user') { $url = '/dashboard'; }
        // return redirect()->intended(RouteServiceProvider::HOME);
        return redirect()->intended($url);
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
