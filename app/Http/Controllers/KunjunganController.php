<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\Pasien;
use App\Models\Poli;
use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    // 1. Tampilkan Semua Riwayat Kunjungan / Rekam Medis
    public function index()
    {
        // Menggunakan eager loading (with) agar query database lebih ringan
        $kunjungs = Kunjungan::with(['pasien', 'poli'])->latest()->paginate(10);
        return view('kunjunj.index', compact('kunjungs'));
    }

    // 2. Tampilkan Form Registrasi Kunjungan Pasien
    public function create()
    {
        $pasiens = Pasien::orderBy('nama_pasien')->get();
        $polis = Poli::orderBy('nama_poli')->get();
        return view('kunjunj.create', compact('pasiens', 'polis'));
    }

    // 3. Simpan Transaksi Kunjungan Baru
    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'poli_id' => 'required|exists:polis,id',
            'tanggal_kunjungan' => 'required|date',
            'keluhan' => 'required|string',
            'nama_dokter' => 'required|string|max:255',
            'status_antrian' => 'required|in:Menunggu,Diperiksa,Selesai',
            'diagnosa' => 'nullable|string',
            'tindakan' => 'nullable|string',
        ]);

        Kunjungan::create($request->all());

        return redirect()->route('kunjunj.index')->with('success', 'Registrasi kunjungan pasien berhasil dibuat!');
    }

    // 4. Tampilkan Form Pemeriksaan / Edit Rekam Medis
    public function edit($id)
    {
        $kunjungan = Kunjungan::findOrFail($id);
        $pasiens = Pasien::orderBy('nama_pasien')->get();
        $polis = Poli::orderBy('nama_poli')->get();
        return view('kunjunj.edit', compact('kunjungan', 'pasiens', 'polis'));
    }

    // 5. Perbarui Diagnosa & Status Antrean Pasien
    public function update(Request $request, $id)
    {
        $kunjungan = Kunjungan::findOrFail($id);

        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'poli_id' => 'required|exists:polis,id',
            'tanggal_kunjungan' => 'required|date',
            'keluhan' => 'required|string',
            'nama_dokter' => 'required|string|max:255',
            'status_antrian' => 'required|in:Menunggu,Diperiksa,Selesai',
            'diagnosa' => 'nullable|string',
            'tindakan' => 'nullable|string',
        ]);

        $kunjungan->update($request->all());

        return redirect()->route('kunjunj.index')->with('success', 'Rekam medis pasien berhasil diperbarui!');
    }

    // 6. Hapus Riwayat Kunjungan
    public function destroy($id)
    {
        $kunjungan = Kunjungan::findOrFail($id);
        $kunjungan->delete();
        return redirect()->route('kunjunj.index')->with('success', 'Riwayat kunjungan berhasil dihapus!');
    }
}