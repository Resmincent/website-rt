<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Keluarga;
use App\Models\User;
use App\Models\UsahaWarga;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::count();
        $keluarga = Keluarga::count();
        $kegiatan = Kegiatan::count();
        $usaha = UsahaWarga::count();
        return view('home', compact('user', 'keluarga', 'kegiatan', 'usaha'));
    }
}
