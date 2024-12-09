<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserActive
{
    
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {

            if (!auth()->user()->is_active) {
                auth()->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('login')->with('error', 'Tu cuenta ha sido desactivada.');
            }
        }

        return $next($request);
    }
}
