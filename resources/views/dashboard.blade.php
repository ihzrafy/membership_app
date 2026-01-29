@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-[calc(100vh-4rem)] transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Welcome Section -->
        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-xl p-8 mb-10 overflow-hidden relative animate-fade-in-up border border-gray-100 dark:border-gray-700">
            <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-500/10 rounded-full blur-3xl -mr-16 -mt-16"></div>
            
            <div class="relative z-10 flex flex-col md:flex-row items-center md:items-start justify-between gap-6">
                <div class="flex items-center gap-6">
                    <div class="relative">
                        @if($user->avatar)
                            <img src="{{ $user->avatar }}" alt="Avatar" class="w-24 h-24 rounded-2xl object-cover shadow-lg ring-4 ring-indigo-50 dark:ring-indigo-900 sm:w-32 sm:h-32">
                        @else
                            <div class="w-24 h-24 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center text-white text-4xl font-bold shadow-lg ring-4 ring-indigo-50 dark:ring-indigo-900 sm:w-32 sm:h-32">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                        @endif
                        <div class="absolute bottom-0 right-0 w-6 h-6 bg-green-500 border-4 border-white dark:border-gray-800 rounded-full transform translate-x-1/4 translate-y-1/4"></div>
                    </div>
                    
                    <div class="text-center md:text-left">
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-2">
                            Selamat datang, <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">{{ explode(' ', $user->name)[0] }}</span>! 👋
                        </h1>
                        <p class="text-gray-600 dark:text-gray-400 text-lg">
                            Kelola konten dan membership Anda di dashboard ini
                        </p>
                        <div class="mt-4 flex flex-wrap gap-2 justify-center md:justify-start">
                            <span class="px-3 py-1 bg-indigo-100 dark:bg-indigo-900/50 text-indigo-700 dark:text-indigo-300 rounded-full text-sm font-medium">Member sejak {{ $user->created_at->format('M Y') }}</span>
                            <span class="px-3 py-1 bg-green-100 dark:bg-green-900/50 text-green-700 dark:text-green-300 rounded-full text-sm font-medium">Akun Aktif</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-3 min-w-[200px]">
                    <a href="{{ route('home') }}" class="px-6 py-3 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-white rounded-xl font-semibold transition-colors text-center w-full shadow-sm hover:shadow">
                        Ke Halaman Utama
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="w-full px-6 py-3 bg-red-100 dark:bg-red-900/30 hover:bg-red-200 dark:hover:bg-red-900/50 text-red-600 dark:text-red-400 rounded-xl font-semibold transition-colors text-center shadow-sm hover:shadow">
                            Sign Out
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Left Column: Membership Info -->
            <div class="lg:col-span-2 space-y-8 animate-fade-in-up" style="animation-delay: 0.1s;">
                <!-- Active Membership Card -->
                <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden">
                    <div class="p-8">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center">
                                <svg class="w-6 h-6 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                                Status Membership
                            </h2>
                            <span class="px-4 py-1.5 rounded-full bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-300 font-semibold text-sm">
                                Paket Saat Ini: TIER {{ $user->membership_type }}
                            </span>
                        </div>
                        
                        <!-- Membership Visual Card -->
                        <div @class([
                            'relative overflow-hidden rounded-2xl p-8 mb-8 text-white shadow-lg transform transition-transform hover:scale-[1.01] duration-300 bg-gradient-to-br',
                            'from-green-500 to-teal-600' => $user->membership_type === 'A',
                            'from-indigo-500 to-blue-600' => $user->membership_type === 'B',
                            'from-purple-500 to-pink-600' => $user->membership_type !== 'A' && $user->membership_type !== 'B',
                        ])>
                            
                            <!-- decorative circles -->
                            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-16 -mt-16 pointer-events-none"></div>
                            <div class="absolute bottom-0 left-0 w-32 h-32 bg-white/10 rounded-full blur-2xl -ml-8 -mb-8 pointer-events-none"></div>

                            <div class="relative z-10 flex justify-between items-end">
                                <div>
                                    <div class="text-sm font-medium text-white/80 mb-1">CURRENT PLAN</div>
                                    <div class="text-4xl font-bold mb-4 tracking-tight">TIER {{ $user->membership_type }}</div>
                                    <div class="flex items-center space-x-2 text-sm bg-white/20 backdrop-blur-md px-3 py-1.5 rounded-lg w-fit">
                                        <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                        <span>Status: Aktif</span>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-5xl opacity-20 transform rotate-12">
                                        <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Upgrade Options -->
                        <div class="mt-8 pt-8 border-t border-gray-100 dark:border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Ingin upgrade paket?</h3>
                            <div class="grid sm:grid-cols-2 gap-4">
                                @foreach(['A', 'B', 'C'] as $type)
                                    @if($type !== $user->membership_type)
                                    <form action="{{ route('dashboard.upgrade') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="membership_type" value="{{ $type }}">
                                        <button type="submit" class="w-full flex items-center justify-between p-4 rounded-xl border border-gray-200 dark:border-gray-600 hover:border-indigo-500 dark:hover:border-indigo-500 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition-all duration-200 group">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 rounded-lg flex items-center justify-center mr-3
                                                    {{ $type === 'A' ? 'bg-green-100 text-green-600' : ($type === 'B' ? 'bg-blue-100 text-blue-600' : 'bg-purple-100 text-purple-600') }}">
                                                    {{ $type }}
                                                </div>
                                                <span class="font-medium text-gray-700 dark:text-gray-200 group-hover:text-indigo-600 dark:group-hover:text-indigo-400">Pindah ke Tier {{ $type }}</span>
                                            </div>
                                            <svg class="w-5 h-5 text-gray-400 group-hover:text-indigo-500 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                                        </button>
                                    </form>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Stats & Features -->
            <div class="space-y-8 animate-fade-in-up" style="animation-delay: 0.2s;">
                <!-- Quick Stats -->
                <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-lg border border-gray-100 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Akses Konten Anda</h3>
                    
                    <div class="space-y-6">
                        <!-- Articles Stat -->
                        <div class="relative group">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Artikel Premium</span>
                                <span class="text-sm font-bold text-indigo-600 dark:text-indigo-400">
                                    {{ $user->membership_type === 'C' ? 'Unlimited' : ($user->membership_type === 'B' ? '10/bulan' : '3/bulan') }}
                                </span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5 overflow-hidden">
                                <div class="bg-indigo-600 h-2.5 rounded-full transition-all duration-1000 w-3/4 group-hover:bg-indigo-500"></div>
                            </div>
                        </div>

                        <!-- Videos Stat -->
                        <div class="relative group">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Video Tutorial</span>
                                <span class="text-sm font-bold text-purple-600 dark:text-purple-400">
                                    {{ $user->membership_type === 'C' ? 'Unlimited' : ($user->membership_type === 'B' ? '10/bulan' : '3/bulan') }}
                                </span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5 overflow-hidden">
                                <div class="bg-purple-600 h-2.5 rounded-full transition-all duration-1000 w-1/2 group-hover:bg-purple-500"></div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 grid grid-cols-2 gap-4">
                        <a href="{{ route('articles.index') }}" class="flex flex-col items-center justify-center p-4 bg-gray-50 dark:bg-gray-700/50 rounded-2xl hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors group cursor-pointer">
                            <div class="w-10 h-10 bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 rounded-xl flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" /></svg>
                            </div>
                            <span class="text-xs font-semibold text-gray-600 dark:text-gray-300">Baca Artikel</span>
                        </a>
                        <a href="{{ route('videos.index') }}" class="flex flex-col items-center justify-center p-4 bg-gray-50 dark:bg-gray-700/50 rounded-2xl hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors group cursor-pointer">
                            <div class="w-10 h-10 bg-pink-100 dark:bg-pink-900/30 text-pink-600 dark:text-pink-400 rounded-xl flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </div>
                            <span class="text-xs font-semibold text-gray-600 dark:text-gray-300">Tonton Video</span>
                        </a>
                    </div>
                </div>

                <!-- Support Card -->
                <div class="bg-gradient-to-br from-gray-900 to-gray-800 dark:from-indigo-900 dark:to-purple-900 rounded-3xl shadow-xl p-6 text-white text-center relative overflow-hidden">
                    <div class="relative z-10">
                        <h3 class="text-lg font-bold mb-2">Butuh Bantuan?</h3>
                        <p class="text-sm text-gray-300 mb-4">Tim support kami siap membantu Anda 24/7.</p>
                        <button class="px-4 py-2 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-lg text-sm font-semibold transition-colors">
                            Hubungi Kami
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
