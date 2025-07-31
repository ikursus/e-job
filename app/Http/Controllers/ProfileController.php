<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Step 1: Profile
    public function step1(Request $request)
    {
        // Dapatkan session step 1
        $step1 = session()->get('step1');

        return view('pengguna.profile.step1', compact('step1'));
    }

    public function step1store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        // Simpan data step 1 ke dalam session
        $request->session()->put('step1', [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
        ]);

        return redirect()->route('profile.step2');
    }

    // Step 2: Work Experience
    public function step2()
    {
        $step2 = session()->get('step2');
        return view('pengguna.profile.step2', compact('step2'));
    }

    public function step2store(Request $request)
    {
        $request->validate([
            'date_of_birth' => 'required',
            'gender' => 'required',
            'ic_number' => 'required',
            'education_level' => 'required',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'resume' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $data = [
            'date_of_birth' => $request->input('date_of_birth'),
            'gender' => $request->input('gender'),
            'ic_number' => $request->input('ic_number'),
            'education_level' => $request->input('education_level')
        ];

        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('profile_photos');
        }

        if ($request->hasFile('resume')) {
            $data['resume'] = $request->file('resume')->store('resumes');
        }

        $request->session()->put('step2', $data);

        return redirect()->route('profile.step3');

    }

    // Step 3: Education
    public function step3()
    {
        $step3 = session()->get('step3');
        return view('pengguna.profile.step3', compact('step3'));
    }

    public function step3store(Request $request)
    {
        $data = $request->validate([
            'company' => 'required',
            'position' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',
        ]);

        $request->session()->put('step3', $data);

        return redirect()->route('profile.step-final');
    }

    public function stepFinal()
    {
        $step1 = session()->get('step1');
        $step2 = session()->get('step2');
        $step3 = session()->get('step3');

        return view('pengguna.profile.step-final', compact('step1', 'step2', 'step3'));
    }
}
