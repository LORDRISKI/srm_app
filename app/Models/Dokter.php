<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'poli_id',
        'nama_dokter',
        'sip',
        'no_hp',
        'alamat'
    ];

    // Relasi ke Poliklinik
    public function poli()
    {
        return $this->belongsTo(Poli::class, 'poli_id');
    }

    // Relasi ke Akun User Login
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}