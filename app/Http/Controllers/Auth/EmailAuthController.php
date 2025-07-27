<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailAuthController extends Controller
{
    public function showEmailInput()
    {
        return view('auth.email-input');
    }

    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $email = $request->email;
        $user = User::where('email', $email)->first();

        // Store email in session for next step
        session(['auth_email' => $email]);

        if ($user) {
            // User exists, show login form
            return view('auth.login-password', [
                'email' => $email,
                'user' => $user
            ]);
        } else {
            // User doesn't exist, show registration form
            return view('auth.register-details', [
                'email' => $email
            ]);
        }
    }

    public function loginWithPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
            $request->session()->forget('auth_email');
            return redirect()->intended('dashboard')->with('success', 'Welcome back!');
        }

        return back()->withErrors([
            'password' => 'The provided password is incorrect.',
        ])->withInput();
    }

    public function registerWithDetails(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'membership_type' => 'required|in:A,B,C',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'membership_type' => $request->membership_type,
        ]);

        Auth::login($user);
        $request->session()->forget('auth_email');

        return redirect()->route('dashboard')->with('success', 'Account created successfully! Welcome to Membership Type ' . $request->membership_type);
    }
}
