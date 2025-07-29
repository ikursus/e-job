<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Calculate statistics for the dashboard
        $totalUsers = User::count();
        $activeUsers = User::whereIn('status', ['active', 'aktif'])->count();
        $inactiveUsers = User::whereIn('status', ['inactive', 'tidak aktif'])->count();
        $newThisMonth = User::whereMonth('created_at', now()->month)
                           ->whereYear('created_at', now()->year)
                           ->count();

        return view('admin.users.template-index', compact(
            'totalUsers', 
            'activeUsers', 
            'inactiveUsers', 
            'newThisMonth'
        ));
    }

    public function datatables()
    {
        $query = User::query();

        return DataTables::of($query)
            ->editColumn('name', function($user) {
                return view('admin.users.datatables-name', compact('user'));
            })
            ->addColumn('actions', function($user) {                               
                return view('admin.users.datatables-buttons', compact('user'));
            })
            ->addIndexColumn()
            ->rawColumns(['name', 'actions'])
            ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Dapatkan senarai roles
        $senaraiRoles = Role::all();
        
        return view('admin.users.template-create', compact('senaraiRoles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:filter|unique:users,email',
            'password' => ['required', 'string', 'confirmed', Password::min(3)],
            'status' => 'required',
            'phone' => 'nullable|string|max:15',
        ]);

        // Encrypt the password before saving
        $data['password'] = bcrypt($data['password']); // Encrypt the password

        // Simpan data ke table users menggunakan query builder
        DB::table('users')->insert($data);

        // Redirect ke halaman senarai users dengan mesej kejayaan
        return redirect()->route('admin.users.index')->with('message-success', 'User created successfully.');        
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
        // Dapatkan senarai roles
        $senaraiRoles = Role::all();
        // Cari rekod user berdasarkan ID
        // $user = DB::table('users')->where('id', $id)->first();
        $user =  User::findOrFail($id);

        return view('admin.users.template-edit', compact('user', 'senaraiRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data yang diterima dari form
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:filter|unique:users,email,' . $id,
            'status' => 'required',
            'phone' => 'nullable|string|max:15',
        ]);

        // Cek jika password diisi, jika tidak, jangan ubah password
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->input('password')); // Encrypt the password
        } else {
            unset($data['password']); // Remove password from data if not filled
        }

        // Update data ke table users menggunakan query builder
        DB::table('users')->where('id', $id)->update($data);

        // Redirect ke halaman senarai users dengan mesej kejayaan
        return redirect()->back()->with('message-success', 'User updated successfully.');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect()->route('admin.users.index')->with('message-success', 'Rekod berjaya dihapuskan');
    }
}
