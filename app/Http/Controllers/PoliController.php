<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function index()
    {
        $polis = Poli::latest()->paginate(10);
        return view('polis.index', compact('polis'));
    }

    public function create()
    {
        return view('polis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_poli' => 'required|string|max:255|unique:polis,nama_poli',
            'gedung' => 'nullable|string|max:255',
        ]);

        Poli::create($request->all());

        return redirect()->route('polis.index')->with('success', 'Poliklinik baru berhasil didaftarkan!');
    }

    public function edit(Poli $poli)
    {
        return view('polis.edit', compact('poli'));
    }

    public function update(Request $request, Poli $poli)
    {
        $request->validate([
            'nama_poli' => 'required|string|max:255|unique:polis,nama_poli,' . $poli->id,
            'gedung' => 'nullable|string|max:255',
        ]);

        $poli->update($request->all());

        return redirect()->route('polis.index')->with('success', 'Data poliklinik berhasil diperbarui!');
    }

    public function destroy(Poli $poli)
    {
        $poli->delete();
        return redirect()->route('polis.index')->with('success', 'Poliklinik berhasil dihapus!');
    }
}