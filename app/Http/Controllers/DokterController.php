<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Poli;
use App\Models\User;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Menampilkan daftar dokter
     */
    public function index()
    {
        $dokters = Dokter::with(['poli', 'user'])->latest()->paginate(10);
        return view('dokters.index', compact('dokters'));
    }

    /**
     * Menampilkan form tambah dokter
     */
    public function create()
    {
        $polis = Poli::orderBy('nama_poli')->get();
        
        // Ambil user dengan role 'dokter' yang belum punya profil dokter
        $users = User::where('role', 'dokter')
                     ->whereNotExists(function ($query) {
                         $query->select('*')->from('dokters')->whereColumn('dokters.user_id', 'users.id');
                     })->get();

        return view('dokters.create', compact('polis', 'users'));
    }

    /**
     * Menyimpan data dokter baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_dokter' => 'required|string|max:255',
            'sip'         => 'required|string|max:255|unique:dokters,sip',
            'poli_id'     => 'required|exists:polis,id',
            'user_id'     => 'nullable|exists:users,id|unique:dokters,user_id',
            'no_hp'       => 'nullable|string',
            'alamat'      => 'nullable|string',
        ]);

        Dokter::create($request->all());

        return redirect()->route('dokters.index')->with('success', 'Data dokter berhasil ditambahkan!');
    }

    /**
     * Menghapus data dokter
     */
    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();

        return redirect()->route('dokters.index')->with('success', 'Data dokter berhasil dihapus!');
    }
}