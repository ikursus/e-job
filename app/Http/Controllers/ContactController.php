<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function borangContact() {
        return view('contact');
    }

    public function sendContact(Request $request) {
        
        $data = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email:filter',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        
        Mail::to('contact@mpob.com')->send(new ContactForm($data));

        // Validasi dan simpan data kontak
        return back()->with('status', 'Pesan Anda telah dikirim. Terima kasih!');
    }
}
