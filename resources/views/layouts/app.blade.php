<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-900">
        <div class="flex h-screen overflow-hidden">
            
            <!-- SIDEBAR NAVIGASI -->
            <aside class="w-64 bg-emerald-900 text-white flex flex-col flex-shrink-0 shadow-xl z-20">
                <!-- Logo & Nama Klinik -->
                <div class="p-5 border-b border-emerald-800 flex items-center space-x-3">
                    <svg class="w-8 h-8 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <span class="font-bold text-lg tracking-wider font-mono">SRM-CLINIC</span>
                </div>

                <!-- Menu Sidebar (Scrollable jika menu terlalu panjang) -->
                <nav class="flex-1 overflow-y-auto p-4 space-y-1.5 text-sm">
                    <!-- 1. Dashboard -->
                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2.5 rounded-lg transition {{ request()->routeIs('dashboard') ? 'bg-emerald-700 text-white font-bold shadow-inner' : 'text-emerald-100 hover:bg-emerald-800' }}">
                        <span class="mr-3">📊</span> Dashboard
                    </a>

                    <!-- Divider -->
                    <div class="pt-2 pb-1 text-xs font-semibold text-emerald-400 uppercase tracking-wider px-4">Data Master</div>
                    
                    <a href="{{ route('pasiens.index') }}" class="flex items-center px-4 py-2.5 rounded-lg transition {{ request()->routeIs('pasiens.*') ? 'bg-emerald-700 text-white font-bold shadow-inner' : 'text-emerald-100 hover:bg-emerald-800' }}">
                        <span class="mr-3">👥</span> Data Pasien
                    </a>
                    <a href="{{ route('dokters.index') }}" class="flex items-center px-4 py-2.5 rounded-lg transition {{ request()->routeIs('dokters.*') ? 'bg-emerald-700 text-white font-bold shadow-inner' : 'text-emerald-100 hover:bg-emerald-800' }}">
                         <span class="mr-3">👨‍⚕️</span> Data Dokter
                    </a>
                    <a href="{{ route('polis.index') }}" class="flex items-center px-4 py-2.5 rounded-lg transition {{ request()->routeIs('polis.*') ? 'bg-emerald-700 text-white font-bold shadow-inner' : 'text-emerald-100 hover:bg-emerald-800' }}">
                        <span class="mr-3">🏢</span> Poli / Spesialis
                    </a>
                    <a href="#" class="flex items-center px-4 py-2.5 rounded-lg text-emerald-300 opacity-60 cursor-not-allowed">
                        <span class="mr-3">💰</span> Tindakan & Tarif (Soon)
                    </a>

                    <!-- Divider -->
                    <div class="pt-2 pb-1 text-xs font-semibold text-emerald-400 uppercase tracking-wider px-4">Pelayanan</div>

                    <a href="{{ route('kunjunj.index') }}" class="flex items-center px-4 py-2.5 rounded-lg transition {{ request()->routeIs('kunjunj.*') ? 'bg-emerald-700 text-white font-bold shadow-inner' : 'text-emerald-100 hover:bg-emerald-800' }}">
                        <span class="mr-3">📝</span> Kunjungan & RM
                    </a>
                    <a href="#" class="flex items-center px-4 py-2.5 rounded-lg text-emerald-300 opacity-60 cursor-not-allowed">
                        <span class="mr-3">⏳</span> Antrian Real-time (Soon)
                    </a>
                    <a href="#" class="flex items-center px-4 py-2.5 rounded-lg text-emerald-300 opacity-60 cursor-not-allowed">
                        <span class="mr-3">💊</span> Farmasi / Obat (Soon)
                    </a>
                    <a href="#" class="flex items-center px-4 py-2.5 rounded-lg text-emerald-300 opacity-60 cursor-not-allowed">
                        <span class="mr-3">💳</span> Kasir / Pembayaran (Soon)
                    </a>

                    <!-- Divider -->
                    <div class="pt-2 pb-1 text-xs font-semibold text-emerald-400 uppercase tracking-wider px-4">Sistem</div>
                    <a href="#" class="flex items-center px-4 py-2.5 rounded-lg text-emerald-300 opacity-60 cursor-not-allowed">
                        <span class="mr-3">📈</span> Laporan (Soon)
                    </a>
                    <a href="#" class="flex items-center px-4 py-2.5 rounded-lg text-emerald-300 opacity-60 cursor-not-allowed">
                        <span class="mr-3">⚙️</span> Manajemen User (Soon)
                    </a>
                </nav>

                <!-- Informasi User di Bagian Bawah Sidebar -->
                <div class="p-4 border-t border-emerald-800 bg-emerald-950 flex items-center justify-between">
                    <div class="truncate mr-2">
                        <p class="text-xs text-emerald-400 font-semibold">User Login:</p>
                        <p class="text-sm font-bold truncate">{{ Auth::user()->name }}</p>
                    </div>
                    <!-- Form Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="p-2 text-emerald-300 hover:text-rose-400 hover:bg-emerald-900 rounded-lg transition" title="Log Out">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </aside>

            <!-- KONTEN UTAMA -->
            <div class="flex-1 flex flex-col overflow-hidden">
                <!-- Header Atas -->
                @if (isset($header))
                    <header class="bg-white shadow-sm border-b border-gray-100 z-10">
                        <div class="mx-auto py-4 px-6 sm:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Konten Halaman (Scrollable) -->
                <main class="flex-1 overflow-y-auto">
                    {{ $slot }}
                </main>
            </div>

        </div>
    </body>
</html>