<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use App\Notifications\PermohonanBaru;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PermohonanController extends Controller
{
    use AuthorizesRequests;

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

        // Cara 2 mendapatkan senarai permohonan menggunakan kaedah relationship query builder
        $senaraiPermohonan = auth()->user()->senaraiPermohonan;

        // Cara 3 mendapatkan senarai permohonan menggunakan kaedah relationship query builder
        //$senaraiPermohonan = auth()->user()->senaraiPermohonan()->with(['jawatan'])->get();

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

        // Cari pihak pengurusan untuk menerima notifikasi email
        $pengurusan = User::whereHas('roles', function($query) {
            $query->whereIn('name', ['super admin', 'admin']);
        })->get();

        if ($pengurusan) {

            foreach($pengurusan as $admin)
            {
                $admin->notify(new PermohonanBaru($permohonan));
            }
        }

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
        // Pastikan pengguna hanya boleh edit permohonan sendiri
        // if ($permohonan->user_id !== auth()->id()) {
        //     return redirect()->route('permohonan.index')->with('message-danger', 'Anda tidak dibenarkan mengakses permohonan ini.');
        // }
        $this->authorize('update', $permohonan);

        // Hanya permohonan dengan status pending boleh diedit
        if ($permohonan->status !== 'pending') {
            return redirect()->route('permohonan.index')->with('message-danger', 'Permohonan yang telah diproses tidak boleh diedit.');
        }

        return view('pengguna.permohonan-edit', compact('permohonan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permohonan $permohonan)
    {
        // Pastikan pengguna hanya boleh update permohonan sendiri
        // if ($permohonan->user_id !== auth()->id()) {
        //     return redirect()->route('permohonan.index')->with('message-danger', 'Anda tidak dibenarkan mengakses permohonan ini.');
        // }
        $this->authorize('update', $permohonan);

        // Hanya permohonan dengan status pending boleh diupdate
        if ($permohonan->status !== 'pending') {
            return redirect()->route('permohonan.index')->with('message-danger', 'Permohonan yang telah diproses tidak boleh diedit.');
        }

        // Validasi input
        $request->validate([
            'catatan' => 'nullable|string|max:1000',
        ], [
            'catatan.max' => 'Catatan tidak boleh melebihi 1000 aksara.',
        ]);

        // Update permohonan
        $permohonan->update([
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('permohonan.index')->with('message-success', 'Permohonan berjaya dikemaskini.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permohonan $permohonan)
    {
        // Pastikan pengguna hanya boleh delete permohonan sendiri
        if ($permohonan->user_id !== auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'Anda tidak dibenarkan mengakses permohonan ini.'
            ], 403);
        }

        // Hanya permohonan dengan status pending boleh dihapus
        if ($permohonan->status !== 'pending') {
            return response()->json([
                'success' => false,
                'message' => 'Permohonan yang telah diproses tidak boleh dibatalkan.'
            ], 422);
        }

        try {
            // Simpan maklumat jawatan untuk mesej
            $namaJawatan = $permohonan->jawatan->title ?? 'Jawatan';
            
            // Hapus permohonan
            $permohonan->delete();

            return response()->json([
                'success' => true,
                'message' => "Permohonan untuk jawatan '{$namaJawatan}' berjaya dibatalkan."
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ralat berlaku semasa membatalkan permohonan. Sila cuba lagi.'
            ], 500);
        }
    }
}
