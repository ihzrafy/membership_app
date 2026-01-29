<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        if (!in_array($provider, ['google', 'facebook'])) {
            return redirect()->route('login')->with('error', 'Provider tidak didukung.');
        }

        try {
            // Always use stateless mode for Google to avoid session state issues
            if ($provider === 'google') {
                return Socialite::driver($provider)->stateless()->redirect();
            }
            
            // For other providers, use regular mode
            return Socialite::driver($provider)->redirect();
            
        } catch (\Exception $e) {
            \Log::error('OAuth Redirect Error: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Terjadi kesalahan saat redirect ke ' . ucfirst($provider) . ': ' . $e->getMessage());
        }
    }

    public function handleProviderCallback($provider)
    {
        try {
            \Log::info('OAuth callback started', ['provider' => $provider]);
            
            // Check for authorization code
            $request = request();
            if (!$request->has('code')) {
                \Log::error('OAuth callback missing authorization code', [
                    'provider' => $provider,
                    'query_params' => $request->query()
                ]);
                return redirect()->route('login')->with('error', 'Authorization failed. Please try again.');
            }
            
            // Check for error parameter  
            if ($request->has('error')) {
                \Log::error('OAuth callback has error parameter', [
                    'provider' => $provider,
                    'error' => $request->get('error'),
                    'error_description' => $request->get('error_description')
                ]);
                return redirect()->route('login')->with('error', 'Authorization denied: ' . $request->get('error_description', 'Unknown error'));
            }
            
            // Get user from OAuth provider - use stateless for Google
            $socialUser = null;
            
            try {
                \Log::info("Getting OAuth user for provider: {$provider}");
                
                if ($provider === 'google') {
                    // Use stateless mode for Google to avoid session state validation issues
                    \Log::info("Using stateless OAuth for Google");
                    $driver = Socialite::driver($provider);
                    
                    // Check if driver has stateless method before calling
                    if (method_exists($driver, 'stateless')) {
                        $socialUser = $driver->stateless()->user();
                    } else {
                        // Fallback to regular mode if stateless not available
                        \Log::warning("Stateless not available for Google, using regular mode");
                        $socialUser = $driver->user();
                    }
                } else {
                    // Use regular mode for other providers
                    \Log::info("Using regular OAuth for {$provider}");
                    $socialUser = Socialite::driver($provider)->user();
                }
                
            } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
                \Log::warning("OAuth Invalid State Exception for {$provider}", [
                    'error' => $e->getMessage()
                ]);
                return redirect()->route('login')
                    ->with('error', 'Session expired during login. Please try again.');
                    
            } catch (\Exception $e) {
                \Log::error("OAuth error for {$provider}", [
                    'error' => $e->getMessage(),
                    'class' => get_class($e)
                ]);
                throw $e;
            }
            
            if (!$socialUser) {
                throw new \Exception('Unable to retrieve user information from ' . $provider);
            }
            \Log::info('OAuth user received', [
                'provider' => $provider,
                'social_user_id' => $socialUser->getId(),
                'email' => $socialUser->getEmail(),
                'name' => $socialUser->getName()
            ]);
            
            // Check if user already exists
            $existingUser = User::where('email', $socialUser->getEmail())->first();
            \Log::info('Existing user check', ['email' => $socialUser->getEmail(), 'found' => !!$existingUser]);
            
            if ($existingUser) {
                // Update provider info if not set
                if (!$existingUser->provider) {
                    $existingUser->update([
                        'provider' => $provider,
                        'provider_id' => $socialUser->getId(),
                        'avatar' => $socialUser->getAvatar(),
                    ]);
                    \Log::info('Updated existing user provider info', ['user_id' => $existingUser->id]);
                }
                
                Auth::login($existingUser);
                \Log::info('Logged in existing user', ['user_id' => $existingUser->id]);
                return redirect()->intended('/dashboard')->with('success', 'Welcome back!');
            }

            // Create new user with default membership, then redirect to choose membership
            \Log::info('Creating new user from OAuth');
            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'password' => bcrypt(Str::random(32)), // Random password for OAuth users
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
                'avatar' => $socialUser->getAvatar(),
                'membership_type' => null, // Set null so they are forced to choose
                'email_verified_at' => now(),
            ]);
            \Log::info('New user created', ['user_id' => $user->id]);

            // Marketing Automation: Send Welcome Email
            try {
                Mail::to($user->email)->send(new WelcomeEmail($user));
            } catch (\Exception $e) {
                // Log error but continue registration flow
                \Log::error('Failed to send welcome email: ' . $e->getMessage());
            }

            Auth::login($user);
            \Log::info('Logged in new user', ['user_id' => $user->id]);
            
            // Redirect new users to membership selection
            return redirect()->route('membership.select')->with('success', 'Welcome! Please choose your membership type.');

        } catch (\Exception $e) {
            \Log::error('OAuth callback error', [
                'provider' => $provider,
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('login')->with('error', 'Terjadi kesalahan saat login dengan ' . ucfirst($provider) . '. Silakan coba lagi atau gunakan metode login lain.');
        }
    }
}
