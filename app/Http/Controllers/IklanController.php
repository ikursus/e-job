<?php

namespace App\Http\Controllers;

use App\Models\Jawatan;
use App\Models\Permohonan;
use Illuminate\Http\Request;

class IklanController extends Controller
{
    public function index()
    {
        // Senarai jawatan yang diiklankan
        $senaraiJobs = Jawatan::paginate(10);

        // Dapatkan senarai jobs yang dimohon pengguna
        $senaraiPermohonan = Permohonan::where('user_id', auth()->id())
        ->where('status', Permohonan::STATUS_PENDING)
        ->pluck('jawatan_id')
        ->toArray();

        return view('pengguna.template-iklan', compact('senaraiJobs', 'senaraiPermohonan'));
    }
}
