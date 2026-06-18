<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight flex items-center space-x-2">
                <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <span>Manajemen Data Pasien</span>
            </h2>
            <a href="{{ route('pasiens.create') }}" class="inline-flex items-center px-4 py-2 bg-emerald-600 border border-transparent rounded-lg font-bold text-sm text-white tracking-widest hover:bg-emerald-700 active:bg-emerald-800 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Pasien Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-[calc(100vh-65px)]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 rounded-r-lg text-emerald-800 shadow-sm flex items-center justify-between animate-fade-in">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <p class="font-medium text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    @if($pasiens->isEmpty())
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-semibold text-gray-900">Belum ada data pasien</h3>
                            <p class="mt-1 text-sm text-gray-500">Silakan klik tombol di kanan atas untuk menambahkan data pasien pertama.</p>
                        </div>
                    @else
                        <div class="overflow-x-auto rounded-lg border border-gray-100 shadow-sm">
                            <table class="min-w-full divide-y divide-gray-200 text-left">
                                <thead class="bg-gray-50 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    <tr>
                                        <th class="px-6 py-3.5">No. RM</th>
                                        <th class="px-6 py-3.5">Nama Pasien</th>
                                        <th class="px-6 py-3.5">NIK</th>
                                        <th class="px-6 py-3.5">L/P</th>
                                        <th class="px-6 py-3.5">Tanggal Lahir</th>
                                        <th class="px-6 py-3.5">No. HP</th>
                                        <th class="px-6 py-3.5 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-100 text-sm text-gray-700">
                                    @foreach($pasiens as $pasien)
                                        <tr class="hover:bg-gray-50/70 transition duration-150">
                                            <td class="px-6 py-4 font-mono font-bold text-emerald-600">{{ $pasien->no_rm }}</td>
                                            <td class="px-6 py-4 font-semibold text-gray-900">{{ $pasien->nama_pasien }}</td>
                                            <td class="px-6 py-4 text-gray-500">{{ $pasien->nik ?? '-' }}</td>
                                            <td class="px-6 py-4">
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold {{ $pasien->jenis_kelamin == 'L' ? 'bg-blue-50 text-blue-700' : 'bg-pink-50 text-pink-700' }}">
                                                    {{ $pasien->jenis_kelamin }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-gray-600">{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->translatedFormat('d M Y') }}</td>
                                            <td class="px-6 py-4 text-gray-600">{{ $pasien->no_hp ?? '-' }}</td>
                                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium">
                                                <div class="flex justify-center space-x-2">
                                                    <a href="{{ route('pasiens.edit', $pasien->id) }}" class="text-amber-600 hover:text-amber-700 bg-amber-50 hover:bg-amber-100 p-2 rounded-lg transition duration-150" title="Edit Data">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('pasiens.destroy', $pasien->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pasien ini?');" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-rose-600 hover:text-rose-700 bg-rose-50 hover:bg-rose-100 p-2 rounded-lg transition duration-150" title="Hapus Data">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg>
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
                            {{ $pasiens->links() }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>