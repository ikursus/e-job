<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function borangDaftar() {
        // resources/views/auth/register.blade.php
        return view('auth.register');
    }

    public function store(Request $request) {
        
        $data = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email:filter', 'unique:users,email'],
            'phone' => ['nullable'],
            'password' => ['required', 'min:3', 'confirmed']
        ]);

        // Attachkan maklumat status akaun
        $data['status'] = User::STATUS_ACTIVE;

        // DB::table()
        User::create($data);
        
        return redirect('/login')->with('message-success', 'Pendaftaran berhasil. Silakan login.');
    }
}
