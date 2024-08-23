<?php

namespace App\Http\Controllers\Admin;

use App\Models\Keluarga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class KeluargaController extends Controller
{
    /**
     * Display a listing of the families.
     */
    public function index()
    {
        $keluargas = Keluarga::all();
        return view('admin.keluarga.index', compact('keluargas'));
    }

    /**
     * Show the form for creating a new family.
     */
    public function create()
    {
        return view('admin.keluarga.create');
    }

    /**
     * Store a newly created family in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Keluarga::create($request->all());

        return redirect()->route('keluargas.index')->with('success', 'Keluarga berhasil dibuat.');
    }

    /**
     * Display the specified family.
     */
    public function show($id)
    {
        $keluarga = Keluarga::findOrFail($id);
        return view('admin.keluarga.show', compact('keluarga'));
    }

    /**
     * Show the form for editing the specified family.
     */
    public function edit($id)
    {
        $keluarga = Keluarga::findOrFail($id);
        return view('admin.keluarga.edit', compact('keluarga'));
    }

    /**
     * Update the specified family in storage.
     */
    public function update(Request $request, $id)
    {
        $keluarga = Keluarga::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $keluarga->update($request->all());

        return redirect()->route('keluargas.index')->with('success', 'Keluarga berhasil diperbarui.');
    }

    /**
     * Remove the specified family from storage.
     */
    public function destroy($id)
    {
        $keluarga = Keluarga::findOrFail($id);
        $keluarga->delete();

        return redirect()->route('keluargas.index')->with('success', 'Keluarga berhasil dihapus.');
    }
}
