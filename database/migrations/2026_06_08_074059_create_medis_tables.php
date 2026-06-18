<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. TABEL POLIKLINIK
        Schema::create('polis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_poli'); // Contoh: Poli Umum, Poli Gigi
            $table->string('gedung')->nullable();
            $table->timestamps();
        });

        // 2. TABEL PASIEN
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('no_rm')->unique(); // Nomor Rekam Medis (Contoh: RM-0001)
            $table->string('nama_pasien');
            $table->string('nik', 16)->unique()->nullable();
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('alamat')->nullable();
            $table->string('no_hp')->nullable();
            $table->timestamps();
        });

        // 3. TABEL KUNJUNGAN / REKAM MEDIS
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasiens')->onDelete('cascade');
            $table->foreignId('poli_id')->constrained('polis')->onDelete('cascade');
            $table->date('tanggal_kunjungan');
            $table->text('keluhan');
            $table->text('diagnosa')->nullable();
            $table->text('tindakan')->nullable();
            $table->string('nama_dokter');
            $table->enum('status_antrian', ['Menunggu', 'Diperiksa', 'Selesai'])->default('Menunggu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kunjungans');
        Schema::dropIfExists('pasiens');
        Schema::dropIfExists('polis');
    }
};