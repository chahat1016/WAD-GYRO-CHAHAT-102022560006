<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // 1. Check if user is not logged in OR their role is not in allowed roles
        if (!$user || !in_array($user->role, $roles)) {
            return redirect()->route('home')
                ->with('error', 'Akses ditolak! Anda tidak memiliki izin untuk mengakses halaman tersebut!');
        }

        return $next($request);
    }
}
