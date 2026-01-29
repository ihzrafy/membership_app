@extends('layouts.app')

@section('title', 'Choose Membership')

@section('content')
<div class="min-h-[calc(100vh-4rem)] flex items-center justify-center p-4 bg-gray-50 dark:bg-gray-900 transition-colors duration-500">
    <div class="max-w-xl w-full space-y-8 bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 animate-fade-in-up">
        <div class="text-center">
            <div class="mx-auto h-16 w-16 flex items-center justify-center rounded-full bg-indigo-100 dark:bg-indigo-900/50 mb-6 animate-bounce-slow">
                <svg class="h-8 w-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                Pilih Membership Anda
            </h2>
            <p class="text-gray-500 dark:text-gray-400">
                Halo, {{ auth()->user()->name }}! Silakan pilih paket membership untuk memulai.
            </p>
        </div>

        <form action="{{ route('membership.update') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="space-y-4">
                <!-- Type A -->
                <div class="relative group">
                    <input type="radio" name="membership_type" id="type_A" value="A" class="peer sr-only" {{ auth()->user()->membership_type == 'A' ? 'checked' : '' }}>
                    <label for="type_A" class="block p-5 bg-white dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-xl cursor-pointer hover:border-green-500 dark:hover:border-green-500 peer-checked:border-green-500 peer-checked:bg-green-50 dark:peer-checked:bg-green-900/20 transition-all duration-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-green-100 dark:bg-green-900/50 flex items-center justify-center mr-4">
                                    <span class="text-green-600 dark:text-green-400 font-bold">A</span>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Starter (Tier A)</h3>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">3 Artikel & 3 Video</p>
                                </div>
                            </div>
                            <span class="text-lg font-bold text-green-600 dark:text-green-400">IDR 50K</span>
                        </div>
                    </label>
                </div>

                <!-- Type B -->
                <div class="relative group">
                    <input type="radio" name="membership_type" id="type_B" value="B" class="peer sr-only" {{ auth()->user()->membership_type == 'B' ? 'checked' : '' }}>
                    <label for="type_B" class="block p-5 bg-white dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-xl cursor-pointer hover:border-indigo-500 dark:hover:border-indigo-500 peer-checked:border-indigo-500 peer-checked:bg-indigo-50 dark:peer-checked:bg-indigo-900/20 transition-all duration-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center mr-4">
                                    <span class="text-indigo-600 dark:text-indigo-400 font-bold">B</span>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Pro (Tier B)</h3>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">10 Artikel & 10 Video</p>
                                </div>
                            </div>
                            <span class="text-lg font-bold text-indigo-600 dark:text-indigo-400">IDR 100K</span>
                        </div>
                        <div class="absolute -top-3 right-5 bg-indigo-500 text-white text-xs font-bold px-2 py-1 rounded-full shadow-sm">POPULAR</div>
                    </label>
                </div>

                <!-- Type C -->
                <div class="relative group">
                    <input type="radio" name="membership_type" id="type_C" value="C" class="peer sr-only" {{ auth()->user()->membership_type == 'C' ? 'checked' : '' }}>
                    <label for="type_C" class="block p-5 bg-white dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-xl cursor-pointer hover:border-purple-500 dark:hover:border-purple-500 peer-checked:border-purple-500 peer-checked:bg-purple-50 dark:peer-checked:bg-purple-900/20 transition-all duration-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-purple-100 dark:bg-purple-900/50 flex items-center justify-center mr-4">
                                    <span class="text-purple-600 dark:text-purple-400 font-bold">C</span>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Ultimate (Tier C)</h3>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Unlimited Access</p>
                                </div>
                            </div>
                            <span class="text-lg font-bold text-purple-600 dark:text-purple-400">IDR 150K</span>
                        </div>
                    </label>
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transform hover:-translate-y-0.5 transition-all duration-200 shadow-lg hover:shadow-indigo-500/50">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </span>
                    Lanjutkan ke Dashboard
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
