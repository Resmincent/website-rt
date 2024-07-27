<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jeniss = Jenis::all();
        return view('admin.jenis.index', [
            'jeniss' => $jeniss
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jenis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nama_jenis' => 'required|string|max:255',
            'perawatan' => "required|string",
            'deskripsi' => 'required|string',
        ]);

        DB::beginTransaction();

        try {
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/jenis', $gambar->hashName());

            Jenis::create([
                'gambar' => $gambar->hashName(),
                'nama_jenis' => $request->nama_jenis,
                'perawatan' => $request->perawatan,
                'deskripsi' => $request->deskripsi
            ]);

            DB::commit();

            return redirect(route('daftar-jenis'))->with('success', 'Data Berhasil Disimpan');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect(route('daftar-jenis'))->with('error', 'Data Gagal Disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jenis = Jenis::findOrFail($id);
        return view('admin.jenis.detail', compact("jenis"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenis = Jenis::findOrFail($id);
        return view('admin.jenis.edit', [
            'jenis' => $jenis
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'gambar' => 'image|mimes:jpeg,jpg,png|max:2048',
            'nama_jenis' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'perawatan' => "required|string",

        ]);

        DB::beginTransaction();

        try {
            $jenis = Jenis::findOrFail($id);

            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $gambar->storeAs('public/jenis', $gambar->hashName());
                Storage::delete('public/jenis/' . $jenis->gambar);

                $jenis->update([
                    'gambar' => $gambar->hashName(),
                    'nama_jenis' => $request->nama_jenis,
                    'perawatan' => $request->perawatan,
                    'deskripsi' => $request->deskripsi
                ]);
            } else {
                $jenis->update($validatedData);
            }

            DB::commit();

            return redirect(route('daftar-jenis'))->with('success', 'Data Berhasil Diupdate');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect(route('daftar-jenis'))->with('error', 'Data Gagal Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenis = Jenis::findOrFail($id);
        Storage::delete('public/artikels/' . $jenis->gambar);

        $jenis->delete();
        return redirect(route('daftar-jenis'))->with('success', 'Data Berhasil Dihapus');
    }
}
