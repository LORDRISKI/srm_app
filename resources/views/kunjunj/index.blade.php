<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight flex items-center space-x-2">
                <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
                <span>Papan Antrean & Rekam Medis</span>
            </h2>
            <a href="{{ route('kunjunj.create') }}" class="inline-flex items-center px-4 py-2 bg-emerald-600 border border-transparent rounded-lg font-bold text-sm text-white tracking-widest hover:bg-emerald-700 active:bg-emerald-800 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                </svg>
                Daftarkan Kunjungan
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-[calc(100vh-65px)]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 rounded-r-lg text-emerald-800 shadow-sm flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                        <p class="font-medium text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    @if($kunjungs->isEmpty())
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <h3 class="mt-2 text-sm font-semibold text-gray-900">Belum ada kunjungan hari ini</h3>
                            <p class="mt-1 text-sm text-gray-500">Silakan daftarkan pasien ke poliklinik tujuan melalui tombol di atas.</p>
                        </div>
                    @else
                        <div class="overflow-x-auto rounded-lg border border-gray-100 shadow-sm">
                            <table class="min-w-full divide-y divide-gray-200 text-left">
                                <thead class="bg-gray-50 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    <tr>
                                        <th class="px-6 py-3.5">Tanggal</th>
                                        <th class="px-6 py-3.5">Pasien</th>
                                        <th class="px-6 py-3.5">Tujuan Poli</th>
                                        <th class="px-6 py-3.5">Dokter</th>
                                        <th class="px-6 py-3.5">Keluhan Utama</th>
                                        <th class="px-6 py-3.5 text-center">Status</th>
                                        <th class="px-6 py-3.5 text-center">Aksi / Periksa</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-100 text-sm text-gray-700">
                                    @foreach($kunjungs as $kunjungan)
                                        <tr class="hover:bg-gray-50/70 transition duration-150">
                                            <td class="px-6 py-4 whitespace-nowrap text-gray-600">
                                                {{ \Carbon\Carbon::parse($kunjungan->tanggal_kunjungan)->translatedFormat('d M Y') }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="font-bold text-gray-900">{{ $kunjungan->pasien->nama_pasien }}</div>
                                                <div class="text-xs font-mono text-emerald-600">{{ $kunjungan->pasien->no_rm }}</div>
                                            </td>
                                            <td class="px-6 py-4 font-semibold text-gray-700">
                                                {{ $kunjungan->poli->nama_poli }}
                                            </td>
                                            <td class="px-6 py-4 text-gray-900">
                                                {{ $kunjungan->nama_dokter }}
                                            </td>
                                            <td class="px-6 py-4 max-w-xs truncate text-gray-500" title="{{ $kunjungan->keluhan }}">
                                                {{ $kunjungan->keluhan }}
                                            </td>
                                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                                @if($kunjungan->status_antrian == 'Menunggu')
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200 animate-pulse">Menunggu</span>
                                                @elseif($kunjungan->status_antrian == 'Diperiksa')
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-700 border border-blue-200">Diperiksa</span>
                                                @else
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">Selesai</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium">
                                                <div class="flex justify-center space-x-2">
                                                    <!-- Tombol Periksa / Edit -->
                                                    <a href="{{ route('kunjunj.edit', $kunjungan->id) }}" class="inline-flex items-center px-3 py-1.5 bg-gray-100 hover:bg-emerald-50 text-gray-700 hover:text-emerald-700 rounded-lg text-xs font-bold transition duration-150">
                                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2M12.586 3.586a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                                        Periksa / Edit
                                                    </a>
                                                    <!-- Hapus -->
                                                    <form action="{{ route('kunjunj.destroy', $kunjungan->id) }}" method="POST" onsubmit="return confirm('Hapus riwayat kunjungan ini?');" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-rose-600 hover:text-rose-700 bg-rose-50 hover:bg-rose-100 p-2 rounded-lg transition duration-150">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $kunjungs->links() }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>