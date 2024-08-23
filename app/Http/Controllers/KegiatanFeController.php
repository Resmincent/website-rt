<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;

use Illuminate\Http\Request;

class  KegiatanFeController extends Controller
{
    /**
     * Display the landing page with latest 5 Jenis and Events.
     */
    public function index()
    {
        $kegiatans = Kegiatan::latest()->take(10)->get();

        return view('kegiatan', compact('kegiatans'));
    }
}
