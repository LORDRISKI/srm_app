<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-2">
            <a href="{{ route('kunjunj.index') }}" class="text-gray-400 hover:text-emerald-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                Lembar Pemeriksaan & Rekam Medis
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-[calc(100vh-65px)]">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="p-6 sm:p-8 bg-white">
                    
                    <form method="POST" action="{{ route('kunjunj.update', $kunjungan->id) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="bg-gray-50 border border-gray-200 rounded-xl p-5 grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                            <div>
                                <p class="text-xs font-semibold text-gray-400 uppercase">Nama Pasien / No. RM</p>
                                <p class="font-bold text-gray-900 text-base mt-0.5">{{ $kunjungan->pasien->nama_pasien }}</p>
                                <p class="font-mono font-bold text-emerald-600">{{ $kunjungan->pasien->no_rm }}</p>
                                <input type="hidden" name="pasien_id" value="{{ $kunjungan->pasien_id }}">
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-400 uppercase">Poliklinik Tujuan & Dokter</p>
                                <p class="font-bold text-gray-900 text-base mt-0.5">{{ $kunjungan->poli->nama_poli }}</p>
                                <p class="text-gray-600">Tenaga Medis: {{ $kunjungan->nama_dokter }}</p>
                                <input type="hidden" name="poli_id" value="{{ $kunjungan->poli_id }}">
                                <input type="hidden" name="nama_dokter" value="{{ $kunjungan->nama_dokter }}">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="tanggal_kunjungan" class="block text-sm font-semibold text-gray-700">Tanggal Periksa</label>
                                <input id="tanggal_kunjungan" type="date" name="tanggal_kunjungan" value="{{ $kunjungan->tanggal_kunjungan }}" readonly required 
                                    class="w-full mt-1.5 px-4 py-2.5 border border-gray-200 rounded-lg bg-gray-100 text-gray-500 cursor-not-allowed outline-none">
                            </div>

                            <div>
                                <label for="status_antrian" class="block text-sm font-semibold text-gray-700">Status Pemeriksaan Pasien <span class="text-rose-500">*</span></label>
                                <select id="status_antrian" name="status_antrian" required 
                                    class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition cursor-pointer font-semibold">
                                    <option value="Menunggu" {{ old('status_antrian', $kunjungan->status_antrian) == 'Menunggu' ? 'selected' : '' }}>🟡 Menunggu di Antrean</option>
                                    <option value="Diperiksa" {{ old('status_antrian', $kunjungan->status_antrian) == 'Diperiksa' ? 'selected' : '' }}>🔵 Sedang Diperiksa Dokter</option>
                                    <option value="Selesai" {{ old('status_antrian', $kunjungan->status_antrian) == 'Selesai' ? 'selected' : '' }}>🟢 Selesai (Rekam Medis Terkunci)</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="keluhan" class="block text-sm font-semibold text-gray-700">Keluhan Utama (Anamnesis)</label>
                            <textarea id="keluhan" name="keluhan" rows="2" required class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition resize-none">{{ old('keluhan', $kunjungan->keluhan) }}</textarea>
                        </div>

                        <hr class="border-gray-100 my-2">

                        <div>
                            <label for="diagnosa" class="block text-sm font-semibold text-gray-700">Hasil Diagnosa Dokter (Assessment)</label>
                            <textarea id="diagnosa" name="diagnosa" rows="3" placeholder="Masukkan hasil pemeriksaan penyakit atau kode ICD-10..." 
                                class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition resize-none shadow-sm font-medium">{{ old('diagnosa', $kunjungan->diagnosa) }}</textarea>
                            <x-input-error :messages="$errors->get('diagnosa')" class="mt-1.5" />
                        </div>

                        <div>
                            <label for="tindakan" class="block text-sm font-semibold text-gray-700">Tindakan Medis & Terapi / Resep Obat (Plan)</label>
                            <textarea id="tindakan" name="tindakan" rows="3" placeholder="Contoh: Pemberian Paracetamol 500mg, Edukasi tirah baring..." 
                                class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition resize-none shadow-sm text-gray-800">{{ old('tindakan', $kunjungan->tindakan) }}</textarea>
                            <x-input-error :messages="$errors->get('tindakan')" class="mt-1.5" />
                        </div>

                        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
                            <a href="{{ route('kunjunj.index') }}" class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-100 transition duration-150">
                                Kembali ke Papan Antrean
                            </a>
                            <button type="submit" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-bold shadow-sm transition duration-150">
                                Simpan Catatan Medis
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>