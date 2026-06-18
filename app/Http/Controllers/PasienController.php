<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    // 1. Tampilkan Semua Data Pasien
    public function index()
    {
        $pasiens = Pasien::latest()->paginate(10);
        return view('pasiens.index', compact('pasiens'));
    }

    // 2. Tampilkan Form Tambah Pasien
    public function create()
    {
        return view('pasiens.create');
    }

    // 3. Simpan Data Pasien Baru ke Database
    public function store(Request $request)
    {
        $request->validate([
            'no_rm' => 'required|unique:pasiens,no_rm',
            'nama_pasien' => 'required|string|max:255',
            'nik' => 'nullable|digits:16|unique:pasiens,nik',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string',
        ]);

        Pasien::create($request->all());

        return redirect()->route('pasiens.index')->with('success', 'Data pasien berhasil ditambahkan!');
    }

    // 4. Tampilkan Form Edit Pasien
    public function edit(Pasien $pasien)
    {
        return view('pasiens.edit', compact('pasien'));
    }

    // 5. Perbarui Data Pasien di Database
    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'no_rm' => 'required|unique:pasiens,no_rm,' . $pasien->id,
            'nama_pasien' => 'required|string|max:255',
            'nik' => 'nullable|digits:16|unique:pasiens,nik,' . $pasien->id,
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string',
        ]);

        $pasien->update($request->all());

        return redirect()->route('pasiens.index')->with('success', 'Data pasien berhasil diperbarui!');
    }

    // 6. Hapus Data Pasien
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('pasiens.index')->with('success', 'Data pasien berhasil dihapus!');
    }
}