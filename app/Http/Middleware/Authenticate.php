<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        // 1. allow access to login, register, and home routes without authentication
        if ($request->is('/') || $request->is('login') || $request->is('register')) {
            return $next($request);
        }

        // 2. if user is not authenticated, redirect to login with error message
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login untuk melanjutkan!');
        }

        return $next($request);
    }
}
