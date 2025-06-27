<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permohonan;
use Illuminate\Http\Request;
use App\Exports\PermohonanExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class PermohonanController extends Controller
{
    public function index()
    {
        $senaraiPermohonan = Permohonan::all();

        return view('admin.permohonan.template-index', compact('senaraiPermohonan'));
    }

    public function show(Permohonan $permohonan)
    {
        $pdf = PDF::loadView('admin.permohonan.template-pdf', compact('permohonan'));

        return $pdf->stream(date('Ymd') . '-permohonan.pdf');
    }

    public function export(Request $request)
    {
        return Excel::download(new PermohonanExport, date('Ymd') . '-permohonan.xlsx');
    }
}
