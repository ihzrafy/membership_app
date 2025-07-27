@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('articles.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Kembali ke Artikel
            </a>
        </div>

        <!-- Article -->
        <article class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
            <!-- Article Header Image -->
            @if($article->image)
                <div class="w-full h-64 md:h-96 overflow-hidden">
                    <img src="{{ $article->image }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                </div>
            @else
                <div class="w-full h-64 md:h-96 bg-gradient-to-r from-blue-400 to-purple-500 flex items-center justify-center">
                    <span class="text-white text-6xl">📰</span>
                </div>
            @endif

            <!-- Article Content -->
            <div class="p-8">
                <!-- Article Title -->
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    {{ $article->title }}
                </h1>

                <!-- Article Meta -->
                <div class="flex items-center space-x-6 text-gray-600 dark:text-gray-400 mb-8">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ $article->author }}</span>
                    </div>
                    
                    @if($article->published_at)
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ $article->published_at->format('d F Y') }}</span>
                        </div>
                    @endif
                </div>

                <!-- Article Excerpt -->
                @if($article->excerpt)
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 mb-8">
                        <p class="text-lg text-gray-700 dark:text-gray-300 italic">
                            {{ $article->excerpt }}
                        </p>
                    </div>
                @endif

                <!-- Article Content -->
                <div class="prose prose-lg max-w-none dark:prose-invert">
                    {!! nl2br(e($article->content)) !!}
                </div>

                <!-- Article Footer -->
                <div class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Ditulis oleh <strong>{{ $article->author }}</strong>
                            </p>
                            @if($article->published_at)
                                <p class="text-sm text-gray-500 dark:text-gray-500">
                                    {{ $article->published_at->format('d F Y, H:i') }}
                                </p>
                            @endif
                        </div>
                        
                        <!-- Share Buttons -->
                        <div class="flex items-center space-x-3">
                            <span class="text-sm text-gray-600 dark:text-gray-400">Bagikan:</span>
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}&url={{ urlencode(request()->url()) }}" 
                               target="_blank" 
                               class="p-2 bg-blue-100 hover:bg-blue-200 dark:bg-blue-900 dark:hover:bg-blue-800 text-blue-600 dark:text-blue-400 rounded-full transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
                               target="_blank" 
                               class="p-2 bg-blue-100 hover:bg-blue-200 dark:bg-blue-900 dark:hover:bg-blue-800 text-blue-600 dark:text-blue-400 rounded-full transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <!-- Related Articles or CTA -->
        <div class="mt-12">
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg p-8 text-center">
                <h3 class="text-2xl font-bold mb-4">Nikmati Lebih Banyak Konten</h3>
                <p class="text-blue-100 mb-6">
                    Jelajahi artikel dan video lainnya dengan membership Anda
                </p>
                <div class="space-x-4">
                    <a href="{{ route('articles.index') }}" class="bg-white text-blue-600 px-6 py-2 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        Artikel Lainnya
                    </a>
                    <a href="{{ route('videos.index') }}" class="border-2 border-white text-white px-6 py-2 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors">
                        Lihat Video
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.prose {
    color: rgb(55 65 81);
}

.dark .prose {
    color: rgb(209 213 219);
}

.prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
    color: rgb(17 24 39);
    font-weight: bold;
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.dark .prose h1, .dark .prose h2, .dark .prose h3, .dark .prose h4, .dark .prose h5, .dark .prose h6 {
    color: rgb(243 244 246);
}

.prose p {
    margin-bottom: 1.5rem;
    line-height: 1.7;
}

.prose strong {
    font-weight: 600;
    color: rgb(17 24 39);
}

.dark .prose strong {
    color: rgb(243 244 246);
}

.prose a {
    color: rgb(37 99 235);
    text-decoration: underline;
}

.dark .prose a {
    color: rgb(96 165 250);
}

.prose ul, .prose ol {
    margin: 1.5rem 0;
    padding-left: 2rem;
}

.prose li {
    margin-bottom: 0.5rem;
}

.prose blockquote {
    border-left: 4px solid rgb(229 231 235);
    padding-left: 1rem;
    margin: 1.5rem 0;
    font-style: italic;
    color: rgb(107 114 128);
}

.dark .prose blockquote {
    border-left-color: rgb(75 85 99);
    color: rgb(156 163 175);
}
</style>
@endsection
