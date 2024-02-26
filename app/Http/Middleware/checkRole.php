<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            // Jika pengguna belum login, alihkan ke halaman login
            return redirect('/login');
        }

        $user = Auth::user();

        // Periksa peran pengguna
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        // Jika peran pengguna tidak diizinkan, kembalikan ke halaman sebelumnya
        return redirect()->back()->with('error', 'Unauthorized.');
    }
}