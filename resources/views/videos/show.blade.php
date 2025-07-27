@extends('layouts.app')

@section('title', $video->title)

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('videos.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-500">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Back to Videos
        </a>
    </div>

    <!-- Video Content -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
        <!-- Video Player -->
        <div class="aspect-w-16 aspect-h-9 bg-gray-900">
            <div class="flex items-center justify-center h-96">
                <div class="text-center">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z"/>
                    </svg>
                    <p class="text-white text-lg font-medium">{{ $video->title }}</p>
                    <p class="text-gray-300 text-sm mt-2">Video Player Placeholder</p>
                </div>
            </div>
        </div>

        <!-- Video Info -->
        <div class="p-6">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ $video->title }}
                </h1>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    Tipe {{ $video->membership_type }}
                </span>
            </div>

            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-4">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                </svg>
                <span>Duration: {{ $video->duration }}</span>
                
                <svg class="w-4 h-4 ml-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 11H7v6h2v-6zm4 0h-2v6h2v-6zm4 0h-2v6h2v-6zM4 19h16v2H4z"/>
                </svg>
                <span>Published: {{ $video->published_at ? $video->published_at->format('M d, Y') : 'Draft' }}</span>
            </div>

            @if($video->description)
                <div class="prose dark:prose-invert max-w-none">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Description</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">{{ $video->description }}</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Related Videos -->
    @if($relatedVideos->count() > 0)
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Related Videos</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($relatedVideos as $relatedVideo)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="aspect-w-16 aspect-h-9 bg-gray-200 dark:bg-gray-700">
                            <div class="flex items-center justify-center">
                                <svg class="w-12 h-12 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 dark:text-white mb-2 line-clamp-2">
                                {{ $relatedVideo->title }}
                            </h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-3 line-clamp-2">
                                {{ Str::limit($relatedVideo->description, 100) }}
                            </p>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-gray-400">{{ $relatedVideo->duration }}</span>
                                <a href="{{ route('videos.show', $relatedVideo) }}" 
                                   class="text-blue-600 hover:text-blue-500 text-sm font-medium">
                                    Watch
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
