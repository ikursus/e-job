<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $data = $request->validate([
            'email' => 'required|email:filter', // kaedah penulisan validation string
            'password' => ['required', 'min:3'],
        ]);

        return $data;
        
        //return redirect('/dashboard');
    }
















}
