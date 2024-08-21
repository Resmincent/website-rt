<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Kontak;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Menyimpan data ke dalam database
        Kontak::create($request->all());

        // Mengirim email
        Mail::send([], [], function ($message) use ($request) {
            $message->to('your-email@example.com')
                ->subject('Kontak dari ' . $request->name)
                ->setBody('Pesan: ' . $request->message . '<br><br>Email: ' . $request->email, 'text/html');
        });

        return redirect()->route('contact.form')->with('success', 'Pesan telah dikirim!');
    }
}
