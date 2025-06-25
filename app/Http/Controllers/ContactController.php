<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function borangContact() {
        return view('contact');
    }

    public function sendContact(Request $request) {
        // Proses pengiriman pesan kontak
        // Validasi dan simpan data kontak
        return back()->with('status', 'Pesan Anda telah dikirim. Terima kasih!');
    }
}
