@extends('layouts.app')

@section('title', 'Artikel')

@section('content')
<div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">📰 Artikel</h1>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">
                        Jelajahi koleksi artikel berkualitas sesuai dengan membership Anda
                    </p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Membership Anda</p>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                        Tipe {{ auth()->user()->membership_type }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Membership Limits Info -->
        @php
            $limits = auth()->user()->getMembershipLimits();
        @endphp
        
        @if($limits['articles'] !== null && $limits['articles'] < 1000000)
            <div class="bg-blue-50 dark:bg-blue-900 border border-blue-200 dark:border-blue-700 rounded-lg p-4 mb-6">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-blue-700 dark:text-blue-300">
                        Anda dapat mengakses maksimal <strong>{{ $limits['articles'] }} artikel</strong> dengan membership saat ini.
                        <a href="{{ route('dashboard') }}" class="underline hover:text-blue-900 dark:hover:text-blue-100">Upgrade membership</a> untuk akses lebih banyak.
                    </span>
                </div>
            </div>
        @else
            <div class="bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-700 rounded-lg p-4 mb-6">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-green-700 dark:text-green-300">
                        <strong>Akses unlimited!</strong> Anda dapat membaca semua artikel yang tersedia.
                    </span>
                </div>
            </div>
        @endif

        <!-- Articles Grid -->
        @if($articles->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
                @foreach($articles as $article)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <!-- Article Image -->
                        @if($article->image)
                            <img src="{{ $article->image }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gradient-to-r from-blue-400 to-purple-500 flex items-center justify-center">
                                <span class="text-white text-4xl">📰</span>
                            </div>
                        @endif

                        <!-- Article Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2 line-clamp-2">
                                {{ $article->title }}
                            </h3>
                            
                            @if($article->excerpt)
                                <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-3">
                                    {{ Str::limit($article->excerpt, 120) }}
                                </p>
                            @endif

                            <!-- Article Meta -->
                            <div class="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400 mb-4">
                                <span>{{ $article->author }}</span>
                                @if($article->published_at)
                                    <span>{{ $article->published_at->format('d M Y') }}</span>
                                @endif
                            </div>

                            <!-- Read Button -->
                            <a href="{{ route('articles.show', $article) }}" 
                               class="inline-flex items-center w-full justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                                Baca Artikel
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Content Count Info -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 text-center">
                <p class="text-gray-600 dark:text-gray-300">
                    Showing {{ $articles->count() }} articles available for your membership level.
                </p>
            </div>
        @else
            <!-- Empty State -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-12 text-center">
                <div class="w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-4xl">📰</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                    Belum Ada Artikel
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    Artikel akan segera tersedia. Silakan cek kembali nanti.
                </p>
                <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                    Kembali ke Beranda
                </a>
            </div>
        @endif
    </div>
</div>

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
@endsection
