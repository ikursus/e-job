<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            // $response = Http::get('http://jsonplaceholder.typicode.com/posts');
            // $senaraiPosts = $response->json();
            $cacheTerkini = 'posts_terkini';
            $cacheBackup24 = 'posts_backup_24jam';

            // Dapatkan rekod cache Terkini
            $senaraiPosts = Cache::get($cacheTerkini);

            if (is_null($senaraiPosts)) {

                $response = Http::get('http://jsonplaceholder.typicode.com/posts');

                if ($response->successful()) {
                    $senaraiPosts = $response->json();

                    // Simpan rekod cache Terkini
                    Cache::put($cacheTerkini, $senaraiPosts, 21600);

                    // Simpan rekod cache Backup 24 jam
                    Cache::put($cacheBackup24, $senaraiPosts, 86400);
                }
                else {
                    throw new \Exception('Gagal mendapatkan data posts daripada API');
                }
            }

            return view('pengguna.posts.index', [
                'senaraiPosts' => $senaraiPosts
            ]);

        } catch (\Throwable $th) {

            // Jika ada error, dapatkan backup 24 jam
            $senaraiPosts = Cache::get($cacheBackup24);

            if (!is_null($senaraiPosts)) {
                return view('pengguna.posts.index', [
                    'senaraiPosts' => $senaraiPosts,
                    'warning' => 'Tidak dapat mendapatkan data posts yang terkini.',
                ]);
            }

            return view('pengguna.posts.index', [
                'senaraiPosts' => null,
                'warning' => 'Tidak dapat mendapatkan data posts kerana kegagalan API.',
            ]);
        }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $response = Http::get('http://jsonplaceholder.typicode.com/posts/' . $id);
            $post = $response->json();

            return view('pengguna.posts.show', compact('post'));

        } catch (\Throwable $th) {

            return view('posts.show', ['post' => null]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
