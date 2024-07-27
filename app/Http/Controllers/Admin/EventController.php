<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.event.index', [
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.event.create');
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

            Event::create([
                'gambar' => $gambar->hashName(),
                'judul' => $request->judul,
                'deskripsi' => $deskripsi
            ]);

            DB::commit();

            return redirect(route('daftar-event'))->with('success', 'Data Berhasil Disimpan');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect(route('daftar-event'))->with('error', 'Data Gagal Disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.detail', compact("event"));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.edit', [
            'event' => $event
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
            $event = Event::findOrFail($id);

            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $gambar->storeAs('public/artikels', $gambar->hashName());
                Storage::delete('public/artikels/' . $event->gambar);
                $deskripsi = strip_tags($request->input('deskripsi'), '<br>');

                $event->update([
                    'gambar' => $gambar->hashName(),
                    'judul' => $request->judul,
                    'deskripsi' => $deskripsi
                ]);
            } else {
                $event->update($validatedData);
            }

            DB::commit();

            return redirect(route('daftar-event'))->with('success', 'Data Berhasil Diupdate');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect(route('daftar-event'))->with('error', 'Data Gagal Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);

        Storage::delete('public/artikels/' . $event->gambar);

        $event->delete();
        return redirect(route('daftar-event'))->with('success', 'Data Berhasil Dihapus');
    }
}
