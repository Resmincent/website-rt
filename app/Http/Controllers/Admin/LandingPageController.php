<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Keluarga;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display the landing page with latest 5 Jenis and Events.
     */
    public function index()
    {
        $pria_count = User::where('jenis_kelamin', 'Laki-laki')->count();
        $wanita_count = User::where('jenis_kelamin', 'Perempuan')->count();
        $keluarga_count = Keluarga::count();

        return view('landing_page', compact('pria_count', 'wanita_count', 'keluarga_count'));
    }
}
