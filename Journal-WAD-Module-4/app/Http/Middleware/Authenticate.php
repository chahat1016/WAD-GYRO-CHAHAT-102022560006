<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        // Routes allowed without login
        $allowedRoutes = [
            'login',
            'register',
            'home'
        ];

        // Allow access if requested route is in allowed list
        if (in_array($request->route()->getName(), $allowedRoutes)) {
            return $next($request);
        }

        // If user not logged in → redirect to login
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Silakan login untuk melanjutkan!');
        }

        return $next($request);
    }
}
