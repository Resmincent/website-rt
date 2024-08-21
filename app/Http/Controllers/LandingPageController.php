<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display the landing page with latest 5 Jenis and Events.
     */
    public function index()
    {
        $beritas = Berita::latest()->take(5)->get();
        $kegiatans = Kegiatan::latest()->take(5)->get();

        return view('landing_page', compact('beritas', 'kegiatans'));
    }
}
