<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-2">
            <a href="{{ route('dokters.index') }}" class="text-gray-400 hover:text-emerald-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">Registrasi Profil Dokter</h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-[calc(100vh-65px)]">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 p-6 sm:p-8">
                
                <form method="POST" action="{{ route('dokters.store') }}" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="nama_dokter" class="block text-sm font-semibold text-gray-700">Nama Lengkap Dokter <span class="text-rose-500">*</span></label>
                            <input id="nama_dokter" type="text" name="nama_dokter" placeholder="Contoh: dr. Ahmad Subarjo, Sp.A" required value="{{ old('nama_dokter') }}"
                                class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 outline-none transition">
                        </div>
                        <div>
                            <label for="sip" class="block text-sm font-semibold text-gray-700">Nomor SIP (Surat Izin Praktik) <span class="text-rose-500">*</span></label>
                            <input id="sip" type="text" name="sip" placeholder="Contoh: SIP.449/001/DISKES/2026" required value="{{ old('sip') }}"
                                class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 outline-none transition">
                            <x-input-error :messages="$errors->get('sip')" class="mt-1" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="poli_id" class="block text-sm font-semibold text-gray-700">Poliklinik / Spesialisasi <span class="text-rose-500">*</span></label>
                            <select id="poli_id" name="poli_id" required class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 text-gray-900 focus:bg-white focus:ring-2 focus:ring-emerald-500 outline-none transition">
                                <option value="" disabled selected>-- Pilih Poliklinik --</option>
                                @foreach($polis as $pl)
                                    <option value="{{ $pl->id }}">{{ $pl->nama_poli }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="user_id" class="block text-sm font-semibold text-gray-700">Tautkan dengan Akun Login</label>
                            <select id="user_id" name="user_id" class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 text-gray-900 focus:bg-white focus:ring-2 focus:ring-emerald-500 outline-none transition">
                                <option value="">-- Berdiri Sendiri (Tanpa Akun Login) --</option>
                                @foreach($users as $us)
                                    <option value="{{ $us->id }}">{{ $us->name }} ({{ $us->email }})</option>
                                @endforeach
                            </select>
                            <p class="text-[11px] text-gray-400 mt-1">Daftar ini mengambil data pegawai yang Anda buat ber-role 'dokter' di Manajemen User.</p>
                        </div>
                    </div>

                    <div>
                        <label for="no_hp" class="block text-sm font-semibold text-gray-700">Nomor HP / WhatsApp</label>
                        <input id="no_hp" type="text" name="no_hp" placeholder="Contoh: 081234567890" value="{{ old('no_hp') }}"
                            class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 outline-none transition">
                    </div>

                    <div>
                        <label for="alamat" class="block text-sm font-semibold text-gray-700">Alamat Rumah / Praktik</label>
                        <textarea id="alamat" name="alamat" rows="3" placeholder="Tulis alamat lengkap dokter..."
                            class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 outline-none transition resize-none">{{ old('alamat') }}</textarea>
                    </div>

                    <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
                        <a href="{{ route('dokters.index') }}" class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-100 transition">Batal</a>
                        <button type="submit" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-bold shadow-sm transition">Simpan Profil Dokter</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>