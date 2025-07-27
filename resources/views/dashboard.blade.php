@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Welcome Section -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                        Selamat datang, {{ $user->name }}! 👋
                    </h1>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">
                        Kelola konten dan membership Anda di sini
                    </p>
                </div>
                @if($user->avatar)
                    <img src="{{ $user->avatar }}" alt="Avatar" class="w-16 h-16 rounded-full">
                @else
                    <div class="w-16 h-16 bg-gray-300 dark:bg-gray-600 rounded-full flex items-center justify-center">
                        <span class="text-2xl font-bold text-gray-600 dark:text-gray-300">{{ substr($user->name, 0, 1) }}</span>
                    </div>
                @endif
            </div>
        </div>

        <!-- Current Membership -->
        <div class="grid md:grid-cols-3 gap-8 mb-8">
            <div class="md:col-span-2">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                        Membership Anda
                    </h2>
                    
                    <div class="bg-gradient-to-r from-blue-50 to-purple-50 dark:from-gray-700 dark:to-gray-600 rounded-lg p-6 border border-blue-200 dark:border-gray-600">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-4">
                                @if($user->membership_type === 'A')
                                    <div class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center">
                                        <span class="text-xl">🟢</span>
                                    </div>
                                @elseif($user->membership_type === 'B')
                                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center">
                                        <span class="text-xl">🔵</span>
                                    </div>
                                @else
                                    <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center">
                                        <span class="text-xl">🟣</span>
                                    </div>
                                @endif
                                
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        {{ $membershipInfo[$user->membership_type]['name'] }}
                                    </h3>
                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ $membershipInfo[$user->membership_type]['description'] }}
                                    </p>
                                </div>
                            </div>
                            
                            @if($user->membership_type !== 'C')
                                <button onclick="openUpgradeModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                    Upgrade
                                </button>
                            @endif
                        </div>
                        
                        <!-- Features -->
                        <div class="grid md:grid-cols-2 gap-4">
                            @foreach($membershipInfo[$user->membership_type]['features'] as $feature)
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-gray-700 dark:text-gray-300">{{ $feature }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="space-y-6">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Akses Artikel</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">
                                {{ $limits['articles'] ?? '∞' }}
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center">
                            <span class="text-xl">📰</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Akses Video</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">
                                {{ $limits['videos'] ?? '∞' }}
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-red-100 dark:bg-red-900 rounded-full flex items-center justify-center">
                            <span class="text-xl">🎥</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">📰 Artikel</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Jelajahi koleksi artikel berkualitas sesuai dengan membership Anda
                </p>
                <a href="{{ route('articles.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                    Lihat Artikel
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">🎥 Video</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Tonton video pembelajaran dan hiburan sesuai dengan membership Anda
                </p>
                <a href="{{ route('videos.index') }}" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors">
                    Lihat Video
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Upgrade Modal -->
@if($user->membership_type !== 'C')
<div id="upgradeModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white dark:bg-gray-800 rounded-lg max-w-2xl w-full p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Upgrade Membership</h3>
                <button onclick="closeUpgradeModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form action="{{ route('dashboard.upgrade') }}" method="POST">
                @csrf
                <div class="space-y-4 mb-6">
                    @foreach(['B', 'C'] as $type)
                        @if($user->membership_type < $type)
                            <label class="block">
                                <input type="radio" name="membership_type" value="{{ $type }}" class="sr-only peer">
                                <div class="border-2 border-gray-200 dark:border-gray-600 peer-checked:border-blue-500 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-900 rounded-lg p-4 cursor-pointer transition-all">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-4">
                                            @if($type === 'B')
                                                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center">
                                                    <span class="text-xl">🔵</span>
                                                </div>
                                            @else
                                                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center">
                                                    <span class="text-xl">🟣</span>
                                                </div>
                                            @endif
                                            <div>
                                                <h4 class="font-semibold text-gray-900 dark:text-white">{{ $membershipInfo[$type]['name'] }}</h4>
                                                <p class="text-gray-600 dark:text-gray-300">{{ $membershipInfo[$type]['description'] }}</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <div class="text-sm text-gray-500 dark:text-gray-400">Features:</div>
                                            <div class="text-xs text-gray-400 dark:text-gray-500">
                                                {{ implode(', ', $membershipInfo[$type]['features']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        @endif
                    @endforeach
                </div>

                <div class="flex space-x-4">
                    <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg font-medium transition-colors">
                        Upgrade Sekarang
                    </button>
                    <button type="button" onclick="closeUpgradeModal()" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded-lg font-medium transition-colors">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

<script>
function openUpgradeModal() {
    document.getElementById('upgradeModal').classList.remove('hidden');
}

function closeUpgradeModal() {
    document.getElementById('upgradeModal').classList.add('hidden');
}
</script>
@endsection
