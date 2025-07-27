@extends('layouts.app')

@section('title', 'Confirm Email')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <div class="mx-auto h-12 w-12 flex items-center justify-center rounded-full bg-indigo-600">
                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Confirm Your Email
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                We found your {{ ucfirst($provider) }} account
            </p>
        </div>

        <div class="bg-white py-8 px-6 shadow rounded-lg">
            <div class="flex items-center space-x-4 mb-6">
                @if($avatar)
                    <img class="h-12 w-12 rounded-full" src="{{ $avatar }}" alt="{{ $name }}">
                @else
                    <div class="h-12 w-12 rounded-full bg-gray-300 flex items-center justify-center">
                        <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                @endif
                <div>
                    <h3 class="text-lg font-medium text-gray-900">{{ $name }}</h3>
                    <p class="text-sm text-gray-500">{{ $email }}</p>
                </div>
            </div>

            <p class="text-sm text-gray-600 mb-6">
                Do you want to continue with this email address? 
                @if($existingUser)
                    <span class="font-medium text-green-600">This email is already registered and you will be logged in.</span>
                @else
                    <span class="font-medium text-blue-600">A new account will be created with this email. You can choose your membership type after registration.</span>
                @endif
            </p>

            <form action="{{ route('social.confirm') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="provider" value="{{ $provider }}">
                <input type="hidden" name="provider_id" value="{{ $providerId }}">
                <input type="hidden" name="name" value="{{ $name }}">
                <input type="hidden" name="email" value="{{ $email }}">
                <input type="hidden" name="avatar" value="{{ $avatar }}">
                @if($existingUser)
                    <input type="hidden" name="existing_user" value="1">
                @endif

                <div class="flex space-x-4">
                    <button type="submit" 
                            class="flex-1 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white {{ $existingUser ? 'bg-green-600 hover:bg-green-700 focus:ring-green-500' : 'bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500' }} focus:outline-none focus:ring-2 focus:ring-offset-2">
                        {{ $existingUser ? 'Login with this account' : 'Continue with this email' }}
                    </button>
                    <a href="{{ route('login') }}" 
                       class="flex-1 flex justify-center py-2 px-4 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Use different email
                    </a>
                </div>
            </form>
        </div>

        <div class="text-center">
            <p class="text-xs text-gray-500">
                By continuing, you agree to our Terms of Service and Privacy Policy
            </p>
        </div>
    </div>
</div>
@endsection
