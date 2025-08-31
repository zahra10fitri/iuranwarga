<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class AdminMiddleware
// {
//     public function handle(Request $request, Closure $next)
//     {
//         if (Auth::check() && Auth::user()->level === 'admin') {
//             return $next($request);
//         }

//         return redirect()->route('/dashboard'); 
//     }
// }




namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->level === 'admin') {
            return $next($request);
        }

        // kalau bukan admin, kembalikan ke dashboard atau home
        return redirect('/')->with('error', 'Hanya admin yang bisa mengakses halaman ini.');
    }
}

