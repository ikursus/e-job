<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cara 1 mendapatkan senarai permohonan menggunakan kaedah join table query builder
        // $senaraiPermohonan = DB::table('users')
        //     ->join('permohonan', 'users.id', '=', 'permohonan.user_id')
        //     ->join('jawatan', 'permohonan.jawatan_id', '=', 'jawatan.id')
        //     ->where('permohonan.user_id', '=', auth()->id())
        //     ->select(
        //         'users.*', 
        //         'jawatan.title', 
        //         'jawatan.description', 
        //         'permohonan.id as permohonan_id',
        //         'permohonan.status',
        //         'permohonan.catatan',
        //         'permohonan.created_at'
        //     )
        //     ->get();

        $senaraiPermohonan = auth()->user()->senaraiPermohonan;

        return view('pengguna.permohonan', compact('senaraiPermohonan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id = null)
    {
        if ($id == null) {
            return redirect()->back()->with('message-danger', 'Sila pilih jawatan yang ingin dimohon.');
        }

        $permohonan = new Permohonan;
        $permohonan->user_id = auth()->id();
        $permohonan->jawatan_id = $id;
        $permohonan->save();

        return redirect()->route('dashboard.pengguna')->with('message-success', 'Permohonan berjaya dihantar.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permohonan $permohonan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permohonan $permohonan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permohonan $permohonan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permohonan $permohonan)
    {
        //
    }
}
