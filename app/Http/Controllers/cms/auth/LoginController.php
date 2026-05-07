<?php

namespace App\Http\Controllers\cms\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Show the CMS login page.
     */
    public function index(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('cms.dashboard');
        }

        return view('cms.auth.login');
    }

    /**
     * Authenticate a CMS user using username and password.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('cms.dashboard');
        }

        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (! Auth::attempt($credentials, $remember)) {
            return back()
                ->withErrors([
                    'username' => 'Username atau password tidak sesuai.',
                ])
                ->onlyInput('username');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('cms.dashboard'));
    }

    /**
     * Log the current user out of the CMS.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('cms.login');
    }
}
