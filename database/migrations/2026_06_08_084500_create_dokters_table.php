<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel users (jika dokter diberi akun untuk login)
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            // Relasi ke tabel poli (spesialisasi dokter)
            $table->foreignId('poli_id')->constrained('polis')->onDelete('cascade');
            
            $table->string('nama_dokter');
            $table->string('sip'); // Surat Izin Praktik
            $table->string('no_hp')->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokters');
    }
};