<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Segala macam semakan
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Cek role admin
        if (!Auth::user()->hasRole('admin')) {
            return abort(403, 'You do not have admin access.');
        }

        // Kalau tak ada masalah, lanjutkan ke halaman yang ingin dibuka
        return $next($request);
    }
}
