<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class adminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah pengguna telah terautentikasi
    if (!Auth::check()) {
        // Pengguna tidak terautentikasi, alihkan ke halaman login atau berikan respons sesuai kebutuhan
        return redirect('/login');
    }

    // Periksa apakah pengguna memiliki peran dengan ID 1
    if (Auth::user()->role != 1) {
        // Jika peran pengguna bukan ID 1, berikan respons atau alihkan sesuai kebutuhan
        return redirect('/login');
    }

    return $next($request);
    }
}
