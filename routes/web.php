<?php
use App\Http\Controllers\DokterController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasienController; // <-- 1. Wajib di-import agar dikenali
use Illuminate\Support\Facades\Route;

// Halaman awal / welcome
Route::get('/', function () {
    return view('welcome');
});

// Halaman dashboard utama setelah login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grup Route yang dilindungi Login (Auth)
Route::middleware('auth')->group(function () {
    // 2. Perbaikan format array pada ProfileController
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 3. Route Resource untuk CRUD Pasien
    Route::resource('pasiens', PasienController::class);
    Route::resource('polis', PoliController::class);
    Route::resource('kunjunj', KunjunganController::class);
    Route::resource('dokters', DokterController::class);
});

require __DIR__.'/auth.php';