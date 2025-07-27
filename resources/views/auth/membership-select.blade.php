@extends('layouts.app')

@section('title', 'Choose Membership')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <div class="mx-auto h-12 w-12 flex items-center justify-center rounded-full bg-indigo-600">
                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                </svg>
            </div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Choose Your Membership
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Welcome {{ auth()->user()->name }}! Select your membership type to get started.
            </p>
        </div>

        <div class="bg-white py-8 px-6 shadow rounded-lg">
            <form action="{{ route('membership.update') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="space-y-4">
                    <div class="border border-gray-200 rounded-lg p-4 hover:border-indigo-500 focus-within:border-indigo-500 cursor-pointer">
                        <label class="flex items-start cursor-pointer">
                            <input type="radio" name="membership_type" value="A" 
                                   class="mt-1 h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300"
                                   {{ auth()->user()->membership_type == 'A' ? 'checked' : '' }}>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900">Type A - Basic</div>
                                <div class="text-sm text-gray-500">3 articles and 3 videos access</div>
                                <div class="text-xs text-gray-400 mt-1">Perfect for getting started</div>
                            </div>
                        </label>
                    </div>

                    <div class="border border-gray-200 rounded-lg p-4 hover:border-indigo-500 focus-within:border-indigo-500 cursor-pointer">
                        <label class="flex items-start cursor-pointer">
                            <input type="radio" name="membership_type" value="B" 
                                   class="mt-1 h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300"
                                   {{ auth()->user()->membership_type == 'B' ? 'checked' : '' }}>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900">Type B - Standard</div>
                                <div class="text-sm text-gray-500">6 articles and 6 videos access</div>
                                <div class="text-xs text-gray-400 mt-1">Great for regular users</div>
                            </div>
                        </label>
                    </div>

                    <div class="border border-gray-200 rounded-lg p-4 hover:border-indigo-500 focus-within:border-indigo-500 cursor-pointer">
                        <label class="flex items-start cursor-pointer">
                            <input type="radio" name="membership_type" value="C" 
                                   class="mt-1 h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300"
                                   {{ auth()->user()->membership_type == 'C' ? 'checked' : '' }}>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900">Type C - Premium</div>
                                <div class="text-sm text-gray-500">12 articles and 12 videos access</div>
                                <div class="text-xs text-gray-400 mt-1">Best value for power users</div>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="flex space-x-4">
                    <button type="submit" 
                            class="flex-1 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Continue to Dashboard
                    </button>
                </div>
                
                <div class="text-center">
                    <p class="text-xs text-gray-500">
                        You can change your membership type later from your dashboard
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
