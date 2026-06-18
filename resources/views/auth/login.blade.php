<x-guest-layout>
    <div class="min-h-screen flex bg-gray-50">
        
        <div class="hidden lg:flex w-1/2 bg-emerald-600 text-white p-16 flex-col justify-between relative overflow-hidden">
            <div class="absolute -top-20 -left-20 w-80 h-80 bg-emerald-500 rounded-full opacity-20 blur-2xl"></div>
            <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-emerald-700 rounded-full opacity-30 blur-3xl"></div>

            <div class="relative z-10">
                <div class="flex items-center space-x-3 bg-emerald-700/40 w-fit px-4 py-2 rounded-full backdrop-blur-sm border border-emerald-500/30">
                    <svg class="w-6 h-6 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span class="text-xl font-bold tracking-wider">SRM Plus</span>
                </div>
                
                <div class="mt-20">
                    <h1 class="text-4xl font-extrabold leading-tight">Sistem Rekam Medis</h1>
                    <p class="text-emerald-100 text-lg mt-2 font-medium">Solusi Manajemen Kesehatan Digital & Terintegrasi</p>
                </div>
            </div>

            <div class="space-y-6 relative z-10 mb-8">
                <div class="flex items-start space-x-4">
                    <div class="bg-emerald-500/50 p-2 rounded-lg text-emerald-100 border border-emerald-400/30 shadow-inner">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white text-base">Rekam Medis Cepat & Presisi</h4>
                        <p class="text-sm text-emerald-100/80 mt-0.5">Pencatatan keluhan, tindakan, dan riwayat klinis pasien terstruktur.</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="bg-emerald-500/50 p-2 rounded-lg text-emerald-100 border border-emerald-400/30 shadow-inner">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white text-base">Sistem Antrian Poli Real-time</h4>
                        <p class="text-sm text-emerald-100/80 mt-0.5">Pantau status pelayanan dan sisa antrian pasien langsung per poliklinik.</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="bg-emerald-500/50 p-2 rounded-lg text-emerald-100 border border-emerald-400/30 shadow-inner">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white text-base">Laporan Transaksi & Keuangan Akurat</h4>
                        <p class="text-sm text-emerald-100/80 mt-0.5">Akses laporan pendapatan, laba bersih, piutang, hingga stok farmasi.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-16 bg-white">
            <div class="max-w-md w-full">
                <div class="mb-8">
                    <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Selamat Datang Kembali</h2>
                    <p class="text-sm text-gray-500 mt-2">Silakan masuk menggunakan akun Admin SRM atau Nurse Anda.</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700">Alamat Email</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                            class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none">
                        <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700">Kata Sandi</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="w-full mt-1.5 px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none">
                        <x-input-error :messages="$errors->get('password')" class="mt-1.5" />
                    </div>

                    <div class="flex items-center justify-between pt-1">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer">
                            <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500 shadow-sm">
                            <span class="ms-2 text-sm text-gray-600 font-medium select-none">Ingat Saya</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm font-semibold text-emerald-600 hover:text-emerald-700 hover:underline transition" href="{{ route('password.request') }}">
                                Lupa Sandi?
                            </a>
                        @endif
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition duration-150 ease-in-out">
                            Masuk
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-guest-layout>