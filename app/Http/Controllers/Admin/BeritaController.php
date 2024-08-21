<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = Berita::all();
        return view('admin.berita.index', [
            'beritas' => $beritas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'judul' => 'required|min:5',
            'deskripsi' => 'required|min:10'
        ]);

        DB::beginTransaction();

        try {
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/artikels', $gambar->hashName());

            $deskripsi = strip_tags($request->input('deskripsi'), '<br>');

            Berita::create([
                'gambar' => $gambar->hashName(),
                'judul' => $request->judul,
                'deskripsi' => $deskripsi
            ]);

            DB::commit();

            return redirect(route('beritas.index'))->with('success', 'Data Berhasil Disimpan');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect(route('beritas.index'))->with('error', 'Data Gagal Disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.detail', compact("berita"));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', [
            'berita' => $berita
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'gambar' => 'image|mimes:jpeg,jpg,png|max:2048',
            'judul' => 'required|min:5',
            'deskripsi' => 'required|min:10'
        ]);

        DB::beginTransaction();

        try {
            $berita = Berita::findOrFail($id);

            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $gambar->storeAs('public/artikels', $gambar->hashName());
                Storage::delete('public/artikels/' . $berita->gambar);
                $deskripsi = strip_tags($request->input('deskripsi'), '<br>');

                $berita->update([
                    'gambar' => $gambar->hashName(),
                    'judul' => $request->judul,
                    'deskripsi' => $deskripsi
                ]);
            } else {
                $berita->update($validatedData);
            }

            DB::commit();

            return redirect(route('beritas.index'))->with('success', 'Data Berhasil Diupdate');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect(route('beritas.index'))->with('error', 'Data Gagal Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $berita = Berita::findOrFail($id);

        Storage::delete('public/artikels/' . $berita->gambar);

        $berita->delete();
        return redirect(route('beritas.index'))->with('success', 'Data Berhasil Dihapus');
    }
}
