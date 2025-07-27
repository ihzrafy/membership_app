<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

// Test OAuth route that bypasses state validation entirely
Route::get('/oauth-test/{provider}', function($provider) {
    try {
        // First redirect to OAuth provider
        if (!request()->has('code')) {
            return Socialite::driver($provider)->redirect();
        }
        
        // Handle callback
        $socialUser = Socialite::driver($provider)->user();
        
        $user = User::where('email', $socialUser->getEmail())->first();
        
        if (!$user) {
            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'password' => bcrypt(\Illuminate\Support\Str::random(32)),
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
                'avatar' => $socialUser->getAvatar(),
                'membership_type' => 'A',
                'email_verified_at' => now(),
            ]);
            
            Auth::login($user);
            return redirect()->route('membership.select')->with('success', 'Welcome! Please choose your membership type.');
        } else {
            Auth::login($user);
            return redirect()->route('dashboard')->with('success', 'Welcome back!');
        }
        
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'class' => get_class($e),
            'line' => $e->getLine(),
            'file' => $e->getFile()
        ]);
    }
})->name('oauth.test');
