<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight flex items-center space-x-2">
            <span>📊</span>
            <span>Dashboard Sistem Rekam Medis</span>
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-[calc(100vh-65px)]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="bg-gradient-to-r from-emerald-600 to-teal-600 rounded-2xl p-6 sm:p-8 shadow-md text-white flex justify-between items-center relative overflow-hidden">
                <div class="z-10">
                    <h3 class="text-2xl font-bold">Selamat Datang Kembali, {{ Auth::user()->name }}! 👋</h3>
                    <p class="text-emerald-100 mt-2 max-w-xl text-sm leading-relaxed">
                        Sistem Informasi Manajemen Klinik SRM-CLINIC siap digunakan. Pantau aktivitas rekam medis, kelola jadwal dokter, dan layani pasien dengan efisien hari ini.
                    </p>
                </div>
                <div class="hidden md:block text-7xl opacity-20 select-none z-0 absolute right-8">🏥</div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center space-x-5 hover:shadow-md transition">
                    <div class="p-4 bg-blue-50 text-blue-600 rounded-xl text-2xl">👥</div>
                    <div>
                        <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Total Data</p>
                        <h4 class="text-2xl font-bold text-gray-800">Master Pasien</h4>
                        <a href="{{ route('pasiens.index') ?? '#' }}" class="text-xs text-blue-600 hover:underline font-medium inline-flex items-center mt-1">
                            Lihat Detail →
                        </a>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center space-x-5 hover:shadow-md transition">
                    <div class="p-4 bg-emerald-50 text-emerald-600 rounded-xl text-2xl">👨‍⚕️</div>
                    <div>
                        <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Total Data</p>
                        <h4 class="text-2xl font-bold text-gray-800">Master Dokter</h4>
                        <a href="{{ route('dokters.index') ?? '#' }}" class="text-xs text-emerald-600 hover:underline font-medium inline-flex items-center mt-1">
                            Lihat Detail →
                        </a>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center space-x-5 hover:shadow-md transition">
                    <div class="p-4 bg-purple-50 text-purple-600 rounded-xl text-2xl">🏢</div>
                    <div>
                        <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Total Data</p>
                        <h4 class="text-2xl font-bold text-gray-800">Poli / Spesialis</h4>
                        <a href="{{ route('polis.index') ?? '#' }}" class="text-xs text-purple-600 hover:underline font-medium inline-flex items-center mt-1">
                            Lihat Detail →
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h3 class="text-base font-bold text-gray-800 mb-4 flex items-center space-x-2">
                    <span>⚡</span> <span>Pintasan Aksi Cepat</span>
                </h3>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                    <a href="{{ route('pasiens.create') ?? '#' }}" class="p-4 bg-gray-50 hover:bg-emerald-50 rounded-lg text-center border border-gray-100 hover:border-emerald-200 transition group">
                        <div class="text-xl mb-1">➕🧑</div>
                        <div class="text-xs font-bold text-gray-700 group-hover:text-emerald-700">Daftar Pasien Baru</div>
                    </a>
                    <a href="{{ route('dokters.create') ?? '#' }}" class="p-4 bg-gray-50 hover:bg-emerald-50 rounded-lg text-center border border-gray-100 hover:border-emerald-200 transition group">
                        <div class="text-xl mb-1">➕👨‍⚕️</div>
                        <div class="text-xs font-bold text-gray-700 group-hover:text-emerald-700">Tambah Dokter Baru</div>
                    </a>
                    <a href="#" class="p-4 bg-gray-50 hover:bg-emerald-50 rounded-lg text-center border border-gray-100 hover:border-emerald-200 transition group opacity-60 cursor-not-allowed">
                        <div class="text-xl mb-1">📝📓</div>
                        <div class="text-xs font-bold text-gray-700">Catat Kunjungan (Soon)</div>
                    </a>
                    <a href="#" class="p-4 bg-gray-50 hover:bg-emerald-50 rounded-lg text-center border border-gray-100 hover:border-emerald-200 transition group opacity-60 cursor-not-allowed">
                        <div class="text-xl mb-1">💊🛒</div>
                        <div class="text-xs font-bold text-gray-700">Apotek / Obat (Soon)</div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>