<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-2">
            <a href="{{ route('kunjunj.index') }}" class="text-gray-400 hover:text-emerald-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">Registrasi Kunjungan Pasien</h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-[calc(100vh-65px)]">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="p-6 sm:p-8 bg-white">
                    
                    <form method="POST" action="{{ route('kunjunj.store') }}" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Pilih Pasien -->
                            <div>
                                <label for="pasien_id" class="block text-sm font-semibold text-gray-700">Pilih Pasien <span class="text-rose-500">*</span></label>
                                <select id="pasien_id" name="pasien_id" required class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition cursor-pointer">
                                    <option value="" disabled selected>-- Pilih Pasien --</option>
                                    @foreach($pasiens as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama_pasien }} ({{ $p->no_rm }})</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Pilih Poli -->
                            <div>
                                <label for="poli_id" class="block text-sm font-semibold text-gray-700">Poliklinik Tujuan <span class="text-rose-500">*</span></label>
                                <select id="poli_id" name="poli_id" required class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition cursor-pointer">
                                    <option value="" disabled selected>-- Pilih Poliklinik --</option>
                                    @foreach($polis as $pl)
                                        <option value="{{ $pl->id }}">{{ $pl->nama_poli }} - {{ $pl->gedung }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Tanggal Kunjungan -->
                            <div>
                                <label for="tanggal_kunjungan" class="block text-sm font-semibold text-gray-700">Tanggal Kunjungan <span class="text-rose-500">*</span></label>
                                <input id="tanggal_kunjungan" type="date" name="tanggal_kunjungan" value="{{ date('Y-m-d') }}" required class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                            </div>

                            <!-- Nama Dokter -->
                            <div>
                                <label for="nama_dokter" class="block text-sm font-semibold text-gray-700">Dokter yang Menangani <span class="text-rose-500">*</span></label>
                                <input id="nama_dokter" type="text" name="nama_dokter" placeholder="Contoh: dr. Andi Wijaya" required class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                            </div>
                        </div>

                        <!-- Status Awal Antrian -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Status Antrean Awal</label>
                            <input type="hidden" name="status_antrian" value="Menunggu">
                            <div class="mt-2 px-4 py-2.5 bg-amber-50 border border-amber-200 text-amber-800 rounded-lg text-sm font-semibold inline-flex items-center">
                                <span class="w-2 h-2 rounded-full bg-amber-500 mr-2 animate-ping"></span>
                                Menunggu di Antrean
                            </div>
                        </div>

                        <!-- Keluhan Utama -->
                        <div>
                            <label for="keluhan" class="block text-sm font-semibold text-gray-700">Keluhan Utama Pasien <span class="text-rose-500">*</span></label>
                            <textarea id="keluhan" name="keluhan" rows="4" placeholder="Tuliskan keluhan atau gejala awal yang dirasakan pasien..." required class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition resize-none"></textarea>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
                            <a href="{{ route('kunjunj.index') }}" class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-100 transition">Batal</a>
                            <button type="submit" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-bold shadow-sm transition">Daftarkan Antrean</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>