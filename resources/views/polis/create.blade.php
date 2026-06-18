<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-2">
            <a href="{{ route('polis.index') }}" class="text-gray-400 hover:text-emerald-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                Tambah Poliklinik Baru
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-[calc(100vh-65px)]">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="p-6 sm:p-8 bg-white">
                    
                    <form method="POST" action="{{ route('polis.store') }}" class="space-y-6">
                        @csrf

                        <div>
                            <label for="nama_poli" class="block text-sm font-semibold text-gray-700">Nama Poliklinik / Spesialis <span class="text-rose-500">*</span></label>
                            <input id="nama_poli" type="text" name="nama_poli" value="{{ old('nama_poli') }}" placeholder="Contoh: Poli Umum, Poli Gigi, Poli Anak" required
                                class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none">
                            <x-input-error :messages="$errors->get('nama_poli')" class="mt-1.5" />
                        </div>

                        <div>
                            <label for="gedung" class="block text-sm font-semibold text-gray-700">Lokasi / Gedung / Ruangan</label>
                            <input id="gedung" type="text" name="gedung" value="{{ old('gedung') }}" placeholder="Contoh: Gedung A Lantai 1, Ruang Melati"
                                class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none">
                            <x-input-error :messages="$errors->get('gedung')" class="mt-1.5" />
                        </div>

                        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
                            <a href="{{ route('polis.index') }}" class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-100 transition duration-150">
                                Batal
                            </a>
                            <button type="submit" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-bold shadow-sm transition duration-150">
                                Simpan Poliklinik
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>