@extends('layouts.app')

@section('title', 'Marketing Automation')

@section('content')
<div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">🚀 Marketing Automation Engine</h1>
            <p class="text-gray-600 dark:text-gray-300 mt-2">Kelola kampanye email dan broadcast ke member Anda.</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-100 dark:border-gray-700">
                <div class="text-gray-500 dark:text-gray-400 text-sm font-medium">Total User</div>
                <div class="text-3xl font-bold text-gray-900 dark:text-white mt-1">{{ $stats['total_users'] }}</div>
            </div>
            <div class="bg-green-50 dark:bg-green-900/20 rounded-xl p-6 shadow-sm border border-green-100 dark:border-green-800">
                <div class="text-green-600 dark:text-green-400 text-sm font-medium">Member Tipe A</div>
                <div class="text-3xl font-bold text-green-700 dark:text-green-300 mt-1">{{ $stats['type_A'] }}</div>
            </div>
            <div class="bg-indigo-50 dark:bg-indigo-900/20 rounded-xl p-6 shadow-sm border border-indigo-100 dark:border-indigo-800">
                <div class="text-indigo-600 dark:text-indigo-400 text-sm font-medium">Member Tipe B</div>
                <div class="text-3xl font-bold text-indigo-700 dark:text-indigo-300 mt-1">{{ $stats['type_B'] }}</div>
            </div>
            <div class="bg-purple-50 dark:bg-purple-900/20 rounded-xl p-6 shadow-sm border border-purple-100 dark:border-purple-800">
                <div class="text-purple-600 dark:text-purple-400 text-sm font-medium">Member Tipe C</div>
                <div class="text-3xl font-bold text-purple-700 dark:text-purple-300 mt-1">{{ $stats['type_C'] }}</div>
            </div>
        </div>

        <!-- Campaign Form -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden">
            <div class="p-6 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white flex items-center">
                    <svg class="w-6 h-6 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    Buat Kampanye Baru / Email Blast
                </h2>
            </div>
            
            <form action="{{ route('marketing.send') }}" method="POST" class="p-6 space-y-6">
                @csrf
                
                @if(session('success'))
                    <div class="bg-green-100 dark:bg-green-900 border border-green-200 dark:border-green-700 text-green-700 dark:text-green-300 px-4 py-3 rounded relative">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Target Audience</label>
                        <select name="target" class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="all">Semua User</option>
                            <option value="A">Hanya Member Tipe A</option>
                            <option value="B">Hanya Member Tipe B</option>
                            <option value="C">Hanya Member Tipe C</option>
                        </select>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Pilih segmen user yang akan menerima email ini.</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subject Email</label>
                        <input type="text" name="subject" required class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500" placeholder="Contoh: Promo Spesial Bulan Ini!">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Isi Pesan</label>
                    <textarea name="message" rows="6" required class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500" placeholder="Tulis pesan marketing Anda di sini..."></textarea>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Anda dapat menggunakan format plain text.</p>
                </div>

                <div class="flex items-center justify-end">
                    <button type="button" onclick="window.history.back()" class="mr-3 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold rounded-lg shadow-lg hover:shadow-indigo-500/30 transition-all transform hover:-translate-y-0.5">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                            Kirim Blast
                        </span>
                    </button>
                </div>
            </form>
        </div>
        
        <!-- Automation Info -->
        <div class="mt-8 bg-blue-50 dark:bg-blue-900/20 border border-blue-100 dark:border-blue-800 rounded-xl p-6">
            <h3 class="text-lg font-bold text-blue-800 dark:text-blue-300 mb-2">ℹ️ Status Automatisasi</h3>
            <ul class="list-disc list-inside text-blue-700 dark:text-blue-400 space-y-1">
                <li><strong>Welcome Email:</strong> Aktif (Dikirim otomatis saat registrasi)</li>
                <li><strong>Upgrade Confirmation:</strong> Aktif (Dikirim otomatis saat user melakukan upgrade membership)</li>
            </ul>
        </div>

    </div>
</div>
@endsection
