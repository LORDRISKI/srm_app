<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-2">
            <a href="{{ route('pasiens.index') }}" class="text-gray-400 hover:text-emerald-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                Edit Data Pasien: <span class="text-emerald-600">{{ $pasien->nama_pasien }}</span>
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-[calc(100vh-65px)]">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="p-6 sm:p-8 bg-white">
                    
                    <form method="POST" action="{{ route('pasiens.update', $pasien->id) }}" class="space-y-6">
                        @csrf
                        @method('PUT') <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="no_rm" class="block text-sm font-semibold text-gray-700">Nomor Rekam Medis <span class="text-rose-500">*</span></label>
                                <input id="no_rm" type="text" name="no_rm" value="{{ old('no_rm', $pasien->no_rm) }}" required
                                    class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none font-mono font-bold text-emerald-600">
                                <x-input-error :messages="$errors->get('no_rm')" class="mt-1.5" />
                            </div>

                            <div>
                                <label for="nik" class="block text-sm font-semibold text-gray-700">NIK Pasien (16 Digit)</label>
                                <input id="nik" type="text" name="nik" value="{{ old('nik', $pasien->nik) }}" placeholder="Masukkan 16 digit NIK" maxlength="16"
                                    class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none">
                                <x-input-error :messages="$errors->get('nik')" class="mt-1.5" />
                            </div>
                        </div>

                        <div>
                            <label for="nama_pasien" class="block text-sm font-semibold text-gray-700">Nama Lengkap Pasien <span class="text-rose-500">*</span></label>
                            <input id="nama_pasien" type="text" name="nama_pasien" value="{{ old('nama_pasien', $pasien->nama_pasien) }}" required
                                class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none">
                            <x-input-error :messages="$errors->get('nama_pasien')" class="mt-1.5" />
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="tanggal_lahir" class="block text-sm font-semibold text-gray-700">Tanggal Lahir <span class="text-rose-500">*</span></label>
                                <input id="tanggal_lahir" type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}" required
                                    class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none">
                                <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-1.5" />
                            </div>

                            <div>
                                <label for="jenis_kelamin" class="block text-sm font-semibold text-gray-700">Jenis Kelamin <span class="text-rose-500">*</span></label>
                                <select id="jenis_kelamin" name="jenis_kelamin" required
                                    class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none cursor-pointer">
                                    <option value="L" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="P" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-1.5" />
                            </div>
                        </div>

                        <div>
                            <label for="no_hp" class="block text-sm font-semibold text-gray-700">Nomor HP / WhatsApp</label>
                            <input id="no_hp" type="text" name="no_hp" value="{{ old('no_hp', $pasien->no_hp) }}"
                                class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none">
                            <x-input-error :messages="$errors->get('no_hp')" class="mt-1.5" />
                        </div>

                        <div>
                            <label for="alamat" class="block text-sm font-semibold text-gray-700">Alamat Rumah Tinggal</label>
                            <textarea id="alamat" name="alamat" rows="3" class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none resize-none">{{ old('alamat', $pasien->alamat) }}</textarea>
                            <x-input-error :messages="$errors->get('alamat')" class="mt-1.5" />
                        </div>

                        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
                            <a href="{{ route('pasiens.index') }}" class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-100 transition duration-150">
                                Batal
                            </a>
                            <button type="submit" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-bold shadow-sm transition duration-150">
                                Perbarui Data Pasien
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>