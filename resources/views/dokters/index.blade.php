<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight flex items-center space-x-2">
                <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span>Master Data Dokter</span>
            </h2>
            <a href="{{ route('dokters.create') }}" class="inline-flex items-center px-4 py-2 bg-emerald-600 border border-transparent rounded-lg font-bold text-sm text-white tracking-widest hover:bg-emerald-700 shadow-sm transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Dokter Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-[calc(100vh-65px)]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 rounded-r-lg text-emerald-800 shadow-sm flex items-center space-x-3">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <p class="font-medium text-sm">{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="p-6 bg-white">
                    
                    @if($dokters->isEmpty())
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-semibold text-gray-900">Belum ada data dokter</h3>
                            <p class="mt-1 text-sm text-gray-500">Mulai daftarkan dokter beserta spesialisasi polinya.</p>
                        </div>
                    @else
                        <div class="overflow-x-auto rounded-lg border border-gray-100 shadow-sm">
                            <table class="min-w-full divide-y divide-gray-200 text-left">
                                <thead class="bg-gray-50 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    <tr>
                                        <th class="px-6 py-3.5">Nama Dokter</th>
                                        <th class="px-6 py-3.5">No. SIP (Izin)</th>
                                        <th class="px-6 py-3.5">Poliklinik / Spesialis</th>
                                        <th class="px-6 py-3.5">Akun Login</th>
                                        <th class="px-6 py-3.5">Kontak & Alamat</th>
                                        <th class="px-6 py-3.5 text-center w-24">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-100 text-sm text-gray-700">
                                    @foreach($dokters as $dr)
                                        <tr class="hover:bg-gray-50/70 transition duration-150">
                                            <td class="px-6 py-4 font-bold text-gray-900">
                                                {{ $dr->nama_dokter }}
                                            </td>
                                            <td class="px-6 py-4 font-mono text-xs text-gray-600">
                                                {{ $dr->sip }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                                    {{ $dr->poli->nama_poli ?? 'Poli Tidak Ditemukan' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4">
                                                @if($dr->user)
                                                    <div class="text-xs text-gray-900 font-medium mb-1 truncate max-w-[160px]" title="{{ $dr->user->email }}">
                                                        {{ $dr->user->email }}
                                                    </div>
                                                    
                                                    @if(($dr->user->role ?? '') == 'admin')
                                                        <span class="inline-flex text-[10px] px-2 py-0.5 rounded bg-purple-50 text-purple-700 border border-purple-200 font-bold uppercase tracking-wider">Admin</span>
                                                    @elseif(($dr->user->role ?? '') == 'dokter')
                                                        <span class="inline-flex text-[10px] px-2 py-0.5 rounded bg-blue-50 text-blue-700 border border-blue-200 font-bold uppercase tracking-wider">Dokter</span>
                                                    @elseif(($dr->user->role ?? '') == 'farmasi')
                                                        <span class="inline-flex text-[10px] px-2 py-0.5 rounded bg-amber-50 text-amber-700 border border-amber-200 font-bold uppercase tracking-wider">Farmasi</span>
                                                    @else
                                                        <span class="inline-flex text-[10px] px-2 py-0.5 rounded bg-teal-50 text-teal-700 border border-teal-200 font-bold uppercase tracking-wider">Kasir</span>
                                                    @endif
                                                @else
                                                    <span class="text-xs text-gray-400 italic">Belum Ditautkan</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 max-w-xs">
                                                <div class="text-xs font-semibold text-gray-900">{{ $dr->no_hp ?? '-' }}</div>
                                                <div class="text-xs text-gray-500 truncate" title="{{ $dr->alamat }}">{{ $dr->alamat ?? '-' }}</div>
                                            </td>
                                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                                <form action="{{ route('dokters.destroy', $dr->id) }}" method="POST" onsubmit="return confirm('Hapus data dokter ini?');" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-rose-600 hover:text-rose-700 bg-rose-50 hover:bg-rose-100 p-2 rounded-lg transition duration-150">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $dokters->links() }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>