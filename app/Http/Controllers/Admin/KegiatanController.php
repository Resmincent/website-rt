<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatans = Kegiatan::all();
        return view('admin.kegiatan.index', [
            'kegiatans' => $kegiatans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        DB::beginTransaction();

        try {
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/jenis', $gambar->hashName());

            Kegiatan::create([
                'gambar' => $gambar->hashName(),
                'judul' => $request->judul,
                'perawatan' => $request->perawatan,
                'deskripsi' => $request->deskripsi
            ]);

            DB::commit();

            return redirect(route('activitys.index'))->with('success', 'Data Berhasil Disimpan');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect(route('activitys.index'))->with('error', 'Data Gagal Disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('admin.kegiatan.detail', compact("kegiatan"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('admin.kegiatan.edit', [
            'kegiatan' => $kegiatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'gambar' => 'image|mimes:jpeg,jpg,png|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',

        ]);

        DB::beginTransaction();

        try {
            $kegiatan = Kegiatan::findOrFail($id);

            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $gambar->storeAs('public/jenis', $gambar->hashName());
                Storage::delete('public/jenis/' . $kegiatan->gambar);

                $kegiatan->update([
                    'gambar' => $gambar->hashName(),
                    'judul' => $request->judul,
                    'deskripsi' => $request->deskripsi
                ]);
            } else {
                $kegiatan->update($validatedData);
            }

            DB::commit();

            return redirect(route('activitys.index'))->with('success', 'Data Berhasil Diupdate');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect(route('activitys.index'))->with('error', 'Data Gagal Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        Storage::delete('public/artikels/' . $kegiatan->gambar);

        $kegiatan->delete();
        return redirect(route('activitys.index'))->with('success', 'Data Berhasil Dihapus');
    }
}
