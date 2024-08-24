<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|max:255',
            'message' => 'required|string',
        ]);

        // Mengambil data dari form
        $name = $request->input('name');
        $subject = $request->input('subject');
        $message = $request->input('message');


        // Menyusun pesan yang akan dikirim ke WhatsApp
        $whatsappMessage = "Nama: $name\nSubject: $subject\nPesan: $message";

        // Encode pesan agar sesuai dengan format URL
        $whatsappMessage = urlencode($whatsappMessage);

        // Nomor WhatsApp yang akan menerima pesan (ganti dengan nomor yang dituju)
        $whatsappNumber = '6285880548723';

        // Link WhatsApp API
        $whatsappLink = "https://api.whatsapp.com/send?phone=$whatsappNumber&text=$whatsappMessage";

        // Redirect ke link WhatsApp
        return redirect()->away($whatsappLink)->with('status', 'Pesan berhasil dikirim melalui WhatsApp!');
    }
}
