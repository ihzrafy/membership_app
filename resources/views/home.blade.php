@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<div class="relative overflow-hidden bg-gradient-to-r from-blue-600 to-purple-600 dark:from-gray-900 dark:to-gray-800 text-white transition-colors duration-500">
    <div class="absolute inset-0 bg-grid-white/[0.05] bg-[size:20px_20px]"></div>
    <div class="absolute inset-y-0 right-0 w-1/2 bg-gradient-to-l from-white/10 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-gray-50 dark:from-gray-900 to-transparent"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 relative z-10">
        <div class="text-center animate-fade-in-up">
            <h1 class="text-5xl md:text-7xl font-bold mb-6 tracking-tight">
                Selamat Datang di <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-yellow-500 drop-shadow-sm">Membership App</span>
            </h1>
            <p class="text-xl md:text-2xl mb-10 text-blue-100 max-w-3xl mx-auto font-light leading-relaxed">
                Platform konten eksklusif dengan sistem membership yang memberikan akses berbeda berdasarkan tipe keanggotaan Anda.
            </p>
            
            @guest
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="group relative px-8 py-4 bg-yellow-400 hover:bg-yellow-500 text-gray-900 rounded-xl text-lg font-bold transition-all duration-200 shadow-[0_10px_20px_-10px_rgba(250,204,21,0.5)] hover:shadow-[0_20px_30px_-15px_rgba(250,204,21,0.6)] transform hover:-translate-y-1">
                        <span class="flex items-center">
                            Daftar Sekarang
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" /></svg>
                        </span>
                    </a>
                    <a href="{{ route('login') }}" class="px-8 py-4 bg-white/10 hover:bg-white/20 backdrop-blur-sm border border-white/30 text-white rounded-xl text-lg font-semibold transition-all duration-200 hover:shadow-lg transform hover:-translate-y-1">
                        Masuk Akun
                    </a>
                </div>
            @else
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('dashboard') }}" class="group relative px-8 py-4 bg-yellow-400 hover:bg-yellow-500 text-gray-900 rounded-xl text-lg font-bold transition-all duration-200 shadow-[0_10px_20px_-10px_rgba(250,204,21,0.5)] hover:shadow-[0_20px_30px_-15px_rgba(250,204,21,0.6)] transform hover:-translate-y-1">
                        <span class="flex items-center">
                            Ke Dashboard
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                        </span>
                    </a>
                </div>
            @endguest
        </div>
    </div>
</div>

<!-- Membership Types -->
<div class="py-24 bg-gray-50 dark:bg-gray-900 transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-fade-in-up">
            <h2 class="text-3xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                Pilih Membership Anda
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                Dapatkan akses ke konten berkualitas sesuai dengan kebutuhan Anda dengan harga terjangkau.
            </p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Tier A -->
            <div class="bg-white dark:bg-gray-800 rounded-3xl overflow-hidden shadow-xl border border-gray-100 dark:border-gray-700 hover:shadow-2xl hover:scale-105 transition-all duration-300 animate-fade-in-up" onclick="window.location='{{ route('register') }}?membership=A'" style="cursor: pointer;">
                <div class="bg-gradient-to-br from-green-400 to-emerald-600 p-6 text-white text-center relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mr-4 -mt-4 w-24 h-24 bg-white/20 rounded-full blur-2xl"></div>
                    <span class="inline-block py-1 px-3 rounded-full bg-white/20 backdrop-blur-sm text-xs font-bold mb-2">STARTER</span>
                    <h3 class="text-2xl font-bold mb-2">Tier A</h3>
                    <div class="text-4xl font-extrabold mb-1">IDR 50.000</div>
                    <div class="text-sm opacity-90">sekali bayar</div>
                </div>
                <div class="p-8">
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start text-gray-600 dark:text-gray-300">
                            <svg class="w-6 h-6 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Akses <strong>3</strong> Artikel Premium</span>
                        </li>
                        <li class="flex items-start text-gray-600 dark:text-gray-300">
                            <svg class="w-6 h-6 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Akses <strong>3</strong> Video Tutorial</span>
                        </li>
                        <li class="flex items-start text-gray-400">
                            <svg class="w-6 h-6 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            <span>Prioritas Support</span>
                        </li>
                    </ul>
                    <button class="w-full py-3 px-4 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-white font-bold rounded-xl hover:bg-green-500 hover:text-white transition-colors duration-300">
                        Pilih Tier A
                    </button>
                </div>
            </div>

            <!-- Tier B (Popular) -->
            <div class="bg-white dark:bg-gray-800 rounded-3xl overflow-hidden shadow-2xl border-2 border-indigo-500 transform scale-105 hover:scale-110 transition-all duration-300 relative z-10 animate-fade-in-up" onclick="window.location='{{ route('register') }}?membership=B'" style="cursor: pointer; animation-delay: 0.2s;">
                <div class="absolute top-0 right-0 bg-yellow-400 text-xs font-bold px-3 py-1 rounded-bl-lg z-10">POPULAR</div>
                <div class="bg-gradient-to-br from-indigo-500 to-purple-600 p-8 text-white text-center relative overflow-hidden">
                    <div class="absolute bottom-0 left-0 -ml-4 -mb-4 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
                    <span class="inline-block py-1 px-3 rounded-full bg-white/20 backdrop-blur-sm text-xs font-bold mb-2">PRO</span>
                    <h3 class="text-3xl font-bold mb-2">Tier B</h3>
                    <div class="text-5xl font-extrabold mb-1">IDR 100.000</div>
                    <div class="text-sm opacity-90">sekali bayar</div>
                </div>
                <div class="p-8">
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start text-gray-600 dark:text-gray-300">
                            <svg class="w-6 h-6 text-indigo-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Akses <strong>10</strong> Artikel Premium</span>
                        </li>
                        <li class="flex items-start text-gray-600 dark:text-gray-300">
                            <svg class="w-6 h-6 text-indigo-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Akses <strong>10</strong> Video Tutorial</span>
                        </li>
                        <li class="flex items-start text-gray-600 dark:text-gray-300">
                            <svg class="w-6 h-6 text-indigo-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Prioritas Support</span>
                        </li>
                    </ul>
                    <button class="w-full py-4 px-6 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold rounded-xl shadow-lg hover:shadow-indigo-500/30 transition-all duration-300">
                        Pilih Tier B
                    </button>
                </div>
            </div>

            <!-- Tier C -->
            <div class="bg-white dark:bg-gray-800 rounded-3xl overflow-hidden shadow-xl border border-gray-100 dark:border-gray-700 hover:shadow-2xl hover:scale-105 transition-all duration-300 animate-fade-in-up" onclick="window.location='{{ route('register') }}?membership=C'" style="cursor: pointer; animation-delay: 0.4s;">
                <div class="bg-gradient-to-br from-purple-500 to-pink-600 p-6 text-white text-center relative overflow-hidden">
                    <div class="absolute top-0 left-0 -ml-4 -mt-4 w-24 h-24 bg-white/20 rounded-full blur-2xl"></div>
                    <span class="inline-block py-1 px-3 rounded-full bg-white/20 backdrop-blur-sm text-xs font-bold mb-2">ULTIMATE</span>
                    <h3 class="text-2xl font-bold mb-2">Tier C</h3>
                    <div class="text-4xl font-extrabold mb-1">IDR 150.000</div>
                    <div class="text-sm opacity-90">sekali bayar</div>
                </div>
                <div class="p-8">
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start text-gray-600 dark:text-gray-300">
                            <svg class="w-6 h-6 text-purple-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Akses <strong>UNLIMITED</strong> Artikel</span>
                        </li>
                        <li class="flex items-start text-gray-600 dark:text-gray-300">
                            <svg class="w-6 h-6 text-purple-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Akses <strong>UNLIMITED</strong> Video</span>
                        </li>
                        <li class="flex items-start text-gray-600 dark:text-gray-300">
                            <svg class="w-6 h-6 text-purple-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>VIP Support 24/7</span>
                        </li>
                    </ul>
                    <button class="w-full py-3 px-4 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-white font-bold rounded-xl hover:bg-purple-500 hover:text-white transition-colors duration-300">
                        Pilih Tier C
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="py-24 bg-white dark:bg-gray-800 transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-fade-in-up">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Kenapa Memilih Kami?</h2>
            <div class="w-24 h-1 bg-indigo-500 mx-auto rounded-full"></div>
        </div>
        
        <div class="grid md:grid-cols-3 gap-12">
            <div class="text-center group animate-fade-in-up" style="animation-delay: 0.1s;">
                <div class="w-20 h-20 mx-auto bg-blue-100 dark:bg-blue-900/50 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-10 h-10 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">Konten Premium</h3>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">Akses materi pembelajaran eksklusif yang disusun oleh praktisi berpengalaman.</p>
            </div>
            
            <div class="text-center group animate-fade-in-up" style="animation-delay: 0.2s;">
                <div class="w-20 h-20 mx-auto bg-purple-100 dark:bg-purple-900/50 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-10 h-10 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">Video Berkualitas</h3>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">Tutorial video resolusi tinggi dengan penjelasan yang mudah dipahami.</p>
            </div>
            
            <div class="text-center group animate-fade-in-up" style="animation-delay: 0.3s;">
                <div class="w-20 h-20 mx-auto bg-indigo-100 dark:bg-indigo-900/50 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-10 h-10 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">Update Rutin</h3>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">Materi baru ditambahkan setiap minggu agar Anda selalu up-to-date.</p>
            </div>
        </div>
    </div>
</div>
@endsection
