<?php

namespace App\Http\Controllers\Admin;

use App\Models\UsahaWarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class UsahaWargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usahaWargas = UsahaWarga::all();
        return view('admin.usaha.index', compact('usahaWargas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.usaha.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_usaha' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $gambar->storeAs('public/usaha_warga', $gambar->hashName());
                $validatedData['gambar'] = $gambar->hashName();
            }

            UsahaWarga::create($validatedData);

            DB::commit();

            return redirect()->route('usahawarga.index')->with('success', 'Usaha Warga berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('usahawarga.index')->with('error', 'Usaha Warga gagal ditambahkan.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usahaWarga = UsahaWarga::findOrFail($id);
        return view('admin.usaha.show', compact('usahaWarga'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usahaWarga = UsahaWarga::findOrFail($id);
        return view('admin.usaha.edit', compact('usahaWarga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_usaha' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            $usahaWarga = UsahaWarga::findOrFail($id);

            if ($request->hasFile('gambar')) {
                if ($usahaWarga->gambar && Storage::disk('public')->exists($usahaWarga->gambar)) {
                    Storage::disk('public')->delete($usahaWarga->gambar);
                }

                $gambar = $request->file('gambar');
                $gambar->storeAs('public/usaha_warga', $gambar->hashName());
                $validatedData['gambar'] = $gambar->hashName();
            }

            $usahaWarga->update($validatedData);

            DB::commit();

            return redirect()->route('usahawarga.index')->with('success', 'Usaha Warga berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('usahawarga.index')->with('error', 'Usaha Warga gagal diperbarui.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $usahaWarga = UsahaWarga::findOrFail($id);

            if ($usahaWarga->gambar && Storage::disk('public')->exists($usahaWarga->gambar)) {
                Storage::disk('public')->delete($usahaWarga->gambar);
            }

            $usahaWarga->delete();

            DB::commit();

            return redirect()->route('usahawarga.index')->with('success', 'Usaha Warga berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('usahawarga.index')->with('error', 'Usaha Warga gagal dihapus.');
        }
    }
}
