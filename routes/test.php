<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialAuthController;

// Test OAuth routes
Route::get('/test/oauth/google', function() {
    try {
        $user = Laravel\Socialite\Facades\Socialite::driver('google')->user();
        return response()->json([
            'success' => true,
            'user' => [
                'id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'avatar' => $user->getAvatar()
            ]
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'error' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ]);
    }
})->name('test.oauth.google');

Route::get('/test/config', function() {
    return response()->json([
        'google' => config('services.google'),
        'session' => [
            'driver' => config('session.driver'),
            'lifetime' => config('session.lifetime'),
        ],
        'env_check' => [
            'GOOGLE_CLIENT_ID' => env('GOOGLE_CLIENT_ID'),
            'GOOGLE_CLIENT_SECRET' => env('GOOGLE_CLIENT_SECRET') ? 'SET' : 'NOT SET',
            'GOOGLE_REDIRECT_URI' => env('GOOGLE_REDIRECT_URI'),
        ]
    ]);
})->name('test.config');
