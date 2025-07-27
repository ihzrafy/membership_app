@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Selamat Datang di <br>
                <span class="text-yellow-300">Membership App</span>
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-blue-100 max-w-3xl mx-auto">
                Platform konten eksklusif dengan sistem membership yang memberikan akses berbeda berdasarkan tipe keanggotaan Anda
            </p>
            
            @guest
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                        Daftar Sekarang
                    </a>
                    <a href="{{ route('login') }}" class="bg-transparent border-2 border-white hover:bg-white hover:text-gray-900 text-white px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                        Login
                    </a>
                </div>
            @else
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('dashboard') }}" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                        Dashboard
                    </a>
                    <a href="{{ route('articles.index') }}" class="bg-transparent border-2 border-white hover:bg-white hover:text-gray-900 text-white px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                        Lihat Artikel
                    </a>
                </div>
            @endguest
        </div>
    </div>
</div>

<!-- Membership Types -->
<div class="py-16 bg-white dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                Pilih Membership Anda
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400">
                Dapatkan akses ke konten berkualitas sesuai dengan kebutuhan Anda
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Membership A -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-8 border border-gray-200 dark:border-gray-700 hover:shadow-lg transition-shadow">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold text-green-600 dark:text-green-400">A</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Tipe A</h3>
                    <p class="text-gray-600 dark:text-gray-400">Untuk pemula yang ingin mencoba</p>
                </div>
                
                <div class="space-y-4 mb-8">
                    <div class="flex items-center text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Akses 3 Artikel
                    </div>
                    <div class="flex items-center text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Akses 3 Video
                    </div>
                    <div class="flex items-center text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Support Email
                    </div>
                </div>

                <div class="text-center">
                    <span class="text-3xl font-bold text-gray-900 dark:text-white">Gratis</span>
                </div>
            </div>

            <!-- Membership B -->
            <div class="bg-blue-50 dark:bg-blue-900 rounded-2xl p-8 border-2 border-blue-500 dark:border-blue-400 hover:shadow-lg transition-shadow transform scale-105">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-blue-100 dark:bg-blue-800 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold text-blue-600 dark:text-blue-400">B</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Tipe B</h3>
                    <p class="text-gray-600 dark:text-gray-400">Pilihan populer untuk user aktif</p>
                    <div class="inline-block bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-semibold mt-2">
                        Populer
                    </div>
                </div>
                
                <div class="space-y-4 mb-8">
                    <div class="flex items-center text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-blue-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Akses 10 Artikel
                    </div>
                    <div class="flex items-center text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-blue-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Akses 10 Video
                    </div>
                    <div class="flex items-center text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-blue-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Priority Support
                    </div>
                </div>

                <div class="text-center">
                    <span class="text-3xl font-bold text-gray-900 dark:text-white">Rp 99K</span>
                    <span class="text-gray-600 dark:text-gray-400">/bulan</span>
                </div>
            </div>

            <!-- Membership C -->
            <div class="bg-purple-50 dark:bg-purple-900 rounded-2xl p-8 border border-purple-200 dark:border-purple-700 hover:shadow-lg transition-shadow">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-purple-100 dark:bg-purple-800 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold text-purple-600 dark:text-purple-400">C</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Tipe C</h3>
                    <p class="text-gray-600 dark:text-gray-400">Akses unlimited untuk professional</p>
                </div>
                
                <div class="space-y-4 mb-8">
                    <div class="flex items-center text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Artikel Unlimited
                    </div>
                    <div class="flex items-center text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Video Unlimited
                    </div>
                    <div class="flex items-center text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 text-purple-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        24/7 Support
                    </div>
                </div>

                <div class="text-center">
                    <span class="text-3xl font-bold text-gray-900 dark:text-white">Rp 199K</span>
                    <span class="text-gray-600 dark:text-gray-400">/bulan</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Latest Content Preview -->
@if($latestArticles->count() > 0 || $latestVideos->count() > 0)
<div class="py-16 bg-gray-50 dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Latest Articles -->
        @if($latestArticles->count() > 0)
        <div class="mb-16">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Artikel Terbaru</h2>
                @auth
                    <a href="{{ route('articles.index') }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 font-semibold">
                        Lihat Semua →
                    </a>
                @endauth
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($latestArticles as $article)
                <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md hover:shadow-lg transition-shadow overflow-hidden">
                    @if($article->image)
                        <img src="{{ $article->image }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                            <span class="text-white text-2xl font-bold">📖</span>
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2 line-clamp-2">
                            {{ $article->title }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-3">
                            {{ $article->excerpt ?? Str::limit(strip_tags($article->content), 120) }}
                        </p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                {{ $article->published_at?->format('d M Y') }}
                            </span>
                            @auth
                                <a href="{{ route('articles.show', $article) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 font-semibold">
                                    Baca →
                                </a>
                            @else
                                <span class="text-gray-400">Login untuk baca</span>
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Latest Videos -->
        @if($latestVideos->count() > 0)
        <div>
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Video Terbaru</h2>
                @auth
                    <a href="{{ route('videos.index') }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 font-semibold">
                        Lihat Semua →
                    </a>
                @endauth
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($latestVideos as $video)
                <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md hover:shadow-lg transition-shadow overflow-hidden">
                    @if($video->thumbnail)
                        <img src="{{ $video->thumbnail }}" alt="{{ $video->title }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gradient-to-br from-red-400 to-pink-500 flex items-center justify-center">
                            <span class="text-white text-2xl font-bold">🎥</span>
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2 line-clamp-2">
                            {{ $video->title }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-3">
                            {{ $video->description ?? 'Tidak ada deskripsi' }}
                        </p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                {{ $video->duration ?? 'N/A' }}
                            </span>
                            @auth
                                <a href="{{ route('videos.show', $video) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 font-semibold">
                                    Tonton →
                                </a>
                            @else
                                <span class="text-gray-400">Login untuk tonton</span>
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endif

@guest
<!-- CTA Section -->
<div class="bg-gradient-to-r from-purple-600 to-blue-600 text-white py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">
            Siap untuk Memulai?
        </h2>
        <p class="text-xl mb-8 text-purple-100">
            Bergabunglah dengan ribuan member yang sudah menikmati konten berkualitas kami
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('register') }}" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                Daftar Gratis
            </a>
            <a href="{{ route('login') }}" class="bg-transparent border-2 border-white hover:bg-white hover:text-gray-900 text-white px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
                Sudah Punya Akun?
            </a>
        </div>
    </div>
</div>
@endguest

@push('scripts')
<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endpush
@endsection
