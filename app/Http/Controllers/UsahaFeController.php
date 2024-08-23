<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\UsahaWarga;
use Illuminate\Http\Request;

class  UsahaFeController extends Controller
{
    /**
     * Display the landing page with latest 5 Jenis and Events.
     */
    public function index()
    {
        $usahas = UsahaWarga::latest()->take(10)->get();

        return view('umkm_warga', compact('usahas'));
    }
}
