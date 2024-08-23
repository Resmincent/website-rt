<?php

namespace App\Http\Controllers;

use App\Models\Berita;

use Illuminate\Http\Request;

class  BeritaFeController extends Controller
{
    /**
     * Display the landing page with latest 5 Jenis and Events.
     */
    public function index()
    {
        $beritas = Berita::latest()->take(10)->get();

        return view('berita', compact('beritas'));
    }
}
