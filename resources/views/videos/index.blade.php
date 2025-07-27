@extends('layouts.app')

@section('title', 'Video')

@section('content')
<div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">🎥 Video</h1>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">
                        Tonton video pembelajaran dan hiburan berkualitas tinggi
                    </p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Membership Anda</p>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                        Tipe {{ auth()->user()->membership_type }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Membership Limits Info -->
        @php
            $limits = auth()->user()->getMembershipLimits();
        @endphp
        
        @if($limits['videos'] !== null)
            <div class="bg-red-50 dark:bg-red-900 border border-red-200 dark:border-red-700 rounded-lg p-4 mb-6">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-red-700 dark:text-red-300">
                        Anda dapat menonton maksimal <strong>{{ $limits['videos'] }} video</strong> dengan membership saat ini.
                        <a href="{{ route('dashboard') }}" class="underline hover:text-red-900 dark:hover:text-red-100">Upgrade membership</a> untuk akses lebih banyak.
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
                        <strong>Akses unlimited!</strong> Anda dapat menonton semua video yang tersedia.
                    </span>
                </div>
            </div>
        @endif

        <!-- Videos Grid -->
        @if($videos->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
                @foreach($videos as $video)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <!-- Video Thumbnail -->
                        <div class="relative">
                            @if($video->thumbnail)
                                <img src="{{ $video->thumbnail }}" alt="{{ $video->title }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gradient-to-r from-red-400 to-orange-500 flex items-center justify-center">
                                    <span class="text-white text-4xl">🎥</span>
                                </div>
                            @endif
                            
                            <!-- Play Button Overlay -->
                            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 opacity-0 hover:opacity-100 transition-opacity">
                                <div class="w-16 h-16 bg-white bg-opacity-90 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-red-600 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            
                            <!-- Duration Badge -->
                            @if($video->duration)
                                <div class="absolute bottom-2 right-2 bg-black bg-opacity-75 text-white text-xs px-2 py-1 rounded">
                                    {{ $video->duration }}
                                </div>
                            @endif
                        </div>

                        <!-- Video Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2 line-clamp-2">
                                {{ $video->title }}
                            </h3>
                            
                            @if($video->description)
                                <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-3">
                                    {{ Str::limit($video->description, 120) }}
                                </p>
                            @endif

                            <!-- Video Meta -->
                            <div class="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400 mb-4">
                                <span>{{ $video->author }}</span>
                                @if($video->published_at)
                                    <span>{{ $video->published_at->format('d M Y') }}</span>
                                @endif
                            </div>

                            <!-- Watch Button -->
                            <a href="{{ route('videos.show', $video) }}" 
                               class="inline-flex items-center w-full justify-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors">
                                Tonton Video
                                <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Content Count Info -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 text-center">
                <p class="text-gray-600 dark:text-gray-300">
                    Showing {{ $videos->count() }} videos available for your membership level.
                </p>
            </div>
        @else
            <!-- Empty State -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-12 text-center">
                <div class="w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-4xl">🎥</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                    Belum Ada Video
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    Video akan segera tersedia. Silakan cek kembali nanti.
                </p>
                <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors">
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
