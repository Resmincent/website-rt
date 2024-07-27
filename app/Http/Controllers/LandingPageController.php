<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Event;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display the landing page with latest 5 Jenis and Events.
     */
    public function index()
    {
        $jenis = Jenis::latest()->take(5)->get();
        $events = Event::latest()->take(5)->get();

        return view('landing_page', compact('jenis', 'events'));
    }
}
