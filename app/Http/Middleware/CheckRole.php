<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Cek autentikasi menggunakan facade Auth
        if (!Auth::check()) {
            abort(403, 'Silakan login terlebih dahulu');
        }

        // Cek role user
        if (Auth::user()->role !== $role) {
            abort(403, 'Anda tidak memiliki izin akses');
        }

        return $next($request);
    }
}