<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function borangLogin() {
        // resources/views/auth/login.blade.php
        return view('auth.login');
    }

    public function prosesLogin(Request $request) {
        
        // $email = $request->input('email');

        // $data = $request->all();
        // $data = $request->only('email');
        // $data = $request->except('_token');
        $credentials = $request->validate([
            'email' => 'required|email:filter', // kaedah penulisan validation string
            'password' => ['required', 'min:3'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Jika ada role admin, redirect ke admin
            if (Auth::user()->hasRole('admin')) {
                return redirect()->intended( route('admin.dashboard') );
            }

            // Jika tiada role admin dan ada role pengguna, redirect ke dashboard 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'Maklumat login tidak sah.',
        ])->onlyInput('email');
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login')->with('message-success', 'Anda berjaya log keluar.');
    }
}
