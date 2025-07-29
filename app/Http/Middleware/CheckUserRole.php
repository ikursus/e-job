<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
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
        if (!Auth::user()->hasRole('user')) {
            // Logout segala sesi
            Auth::logout();
            
            return abort(403, 'You do not have user access.');
        }

        return $next($request);
    }
}
