<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function borangDaftar() {
        // resources/views/auth/register.blade.php
        return view('auth.register');
    }

    public function store(Request $request) {
        // Proses pendaftaran pengguna
        // Validasi dan simpan data pengguna
        return redirect('/login')->with('success', 'Pendaftaran berhasil. Silakan login.');
    }
}
