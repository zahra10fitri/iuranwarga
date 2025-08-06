<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WargaMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->level === 'warga') {
            return $next($request);
        }

        return redirect('/'); // atau ke halaman lain misalnya: return redirect('/dashboard');
    }
}
