<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Kunjungan ini milik pasien siapa?
    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    // Kunjungan ini diarahkan ke poli mana?
    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }
}