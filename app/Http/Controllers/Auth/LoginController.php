<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form
     */
    public function showLoginForm()
    {
        return view('pages.login');
    }

    /**
     * Handle user login and create session
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Regenerate session to prevent fixation
            $request->session()->regenerate();

            // Store user data in session (optional if using Auth::user())
            session([
                'user_id' => Auth::user()->id,
                'user_name' => Auth::user()->name,
                'user_email' => Auth::user()->email,
                'user_role' => Auth::user()->role ?? 'user',
            ]);

            return redirect()->intended('/dashboard')->with('success', 'Welcome back!');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    /**
     * Logout user and destroy session
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate session & regenerate token for security
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out.');
    }
}
