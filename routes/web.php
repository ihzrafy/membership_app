<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\Auth\EmailAuthController;
use App\Http\Controllers\Auth\MembershipController;
use App\Http\Controllers\MarketingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('/login', function () {
    $credentials = request()->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
    
    if (auth()->attempt($credentials, request()->has('remember'))) {
        request()->session()->regenerate();
        return redirect()->intended('dashboard');
    }
    
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->withInput();
})->name('login.post')->middleware('guest');

Route::get('/register', function () {
    return view('auth.register');
})->name('register')->middleware('guest');

Route::post('/register', function () {
    $data = request()->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'membership_type' => 'required|in:A,B,C',
    ]);
    
    $user = \App\Models\User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
        'membership_type' => $data['membership_type'],
    ]);
    
    auth()->login($user);
    
    // Marketing Automation: Send Welcome Email
    try {
        Mail::to($user->email)->send(new WelcomeEmail($user));
    } catch (\Exception $e) {
        // Log error but continue registration flow
        \Log::error('Failed to send welcome email: ' . $e->getMessage());
    }

    return redirect()->route('dashboard')->with('success', 'Account created successfully! Welcome to Membership Type ' . $data['membership_type']);
})->name('register.post')->middleware('guest');

Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('home');
})->name('logout')->middleware('auth');

// Social Authentication
Route::get('/auth/{provider}', [SocialAuthController::class, 'redirectToProvider'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'handleProviderCallback'])->name('social.callback');

// Membership selection (for OAuth new users)
Route::get('/membership/select', [MembershipController::class, 'showMembershipSelect'])->name('membership.select')->middleware('auth');
Route::post('/membership/update', [MembershipController::class, 'updateMembership'])->name('membership.update')->middleware('auth');

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/upgrade', [DashboardController::class, 'upgrade'])->name('dashboard.upgrade');
    
    // Articles
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
    
    // Videos
    Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
    Route::get('/videos/{video}', [VideoController::class, 'show'])->name('videos.show');

    // Marketing Automation (Admin Only in real app, but for demo accessible)
    Route::get('/marketing', [MarketingController::class, 'index'])->name('marketing.index');
    Route::post('/marketing/send', [MarketingController::class, 'sendCampaign'])->name('marketing.send');
});

// Fallback route
Route::fallback(function () {
    return redirect()->route('home');
});

// Include test routes in development
if (app()->environment('local')) {
    require __DIR__.'/test.php';
    require __DIR__.'/oauth-test.php';
}
