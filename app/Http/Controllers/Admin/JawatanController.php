<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jawatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class JawatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $senaraiJawatan = Jawatan::all(); // Retrieve all records from the Jawatan model

        return view('admin.jawatan.template-index', compact('senaraiJawatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jawatan.template-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:open,closed',
            'quota' => 'required|integer|min:1',
            'date_from' => 'required|date',
            'date_till' => 'required|date|after_or_equal:date_from',
        ]);

        // Dump and die to check the data
        // dd($data);
        // DB::table('jawatan')->insert($data);
        // Cara 1 simpan data menggunakan model menerusi new object
        // $jawatan = new Jawatan;
        // $jawatan->title = $data['title'];
        // $jawatan->description = $data['description'];
        // $jawatan->status = $data['status'];
        // $jawatan->quota = $data['quota'];
        // $jawatan->date_from = $data['date_from'];
        // $jawatan->date_till = $data['date_till'];
        // $jawatan->save();

        // Cara 2 simpan data menggunakan model menerusi create
        Jawatan::create($data);

        return redirect()->route('admin.jawatan.index')->with('message-success', 'Jawatan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jawatan = Jawatan::findOrFail($id); // Retrieve the Jawatan record by ID

        return view('admin.jawatan.template-edit', compact('jawatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:open,closed',
            'quota' => 'required|integer|min:1',
            'date_from' => 'required|date',
            'date_till' => 'required|date|after_or_equal:date_from',
        ]);

        $jawatan = Jawatan::findOrFail($id);
        $jawatan->update($data);

        return redirect()->route('admin.jawatan.index')->with('message-success', 'Jawatan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jawatan $jawatan)
    {
        $jawatan->delete();

        return redirect()->route('admin.jawatan.index')->with('message-success', 'Jawatan deleted successfully.');
    }
}
