<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    public function borangReset() {
        // resources/views/auth/passwords/reset.blade.php
        return view('auth.password-request');
    }

    public function emailReset(Request $request) {
        // Proses pengiriman email reset password
        // Validasi email dan kirim link reset
        return back()->with('status', 'Link reset password telah dikirim ke email Anda.');
    }

    public function updatePassword() {
        // Proses reset password
        // Validasi token dan update password
        return redirect('/login')->with('success', 'Password Anda telah direset.');
    }
}
