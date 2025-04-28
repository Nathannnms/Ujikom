<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Jika sudah login, arahkan sesuai role
     */
    public function handle(Request $request, Closure $next, ...$guards): Response
    {
        $guard = $guards[0] ?? null;

        if (Auth::guard($guard)->check()) {
            $role = Auth::user()->role;

            if ($role === 'admin') {
                return redirect()->route('penjualan.index');
            } elseif ($role === 'pelanggan') {
                return redirect()->route('pelanggan.index');
            }

            return redirect('/');
        }

        return $next($request);
    }
}
