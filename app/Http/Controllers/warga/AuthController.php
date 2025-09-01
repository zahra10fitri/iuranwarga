<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // tampilkan form login
    public function showLogin()
    {
        return view('login');
    }

    // tampilkan form register
    public function showRegister()
    {
        return view('register');
    }
    
    // proses login
public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // Arahkan sesuai level user
        if ($user->level === 'bendahara') {
            return redirect()->route('admin.payment');
        } elseif ($user->level === 'admin') {
            return redirect()->route('admin.warga'); // ke data warga
        } elseif ($user->level === 'warga') {
            return redirect()->route('warga.dashboard');
        } else {
            return redirect('/'); // fallback
        }
    }

    return back()->with('status', 'Email atau password salah!');
}

// proses register
public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
        'level' => 'required|string|in:warga,petugas,admin', // tambahin admin kalau perlu
    ]);

    $user = User::create([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'nohp' => '-',       
        'address' => '-',    
        'level' => $request->level,
    ]);

    Auth::login($user);

    if ($user->level === 'warga') {
        return redirect()->route('warga.dashboard');   // ✅
    } else {
        return redirect()->route('admin.dashboard');   // ✅
    }
}


// app/Http/Controllers/Auth/LoginController.php

protected function redirectTo()
{
    $user = auth()->user();

    if ($user->level === 'bendahara') {
        return route('admin.payment'); // Bendahara ke halaman pembayaran
    }

    if ($user->level === 'admin') {
        return route('admin.warga.index'); // Admin ke data warga
    }

    if ($user->level === 'warga') {
        return route('warga.dashboard'); // Warga ke dashboard warga
    }

    return '/'; // fallback
}



// public function logout(Request $request)
// {
//     Auth::logout();
//     $request->session()->invalidate();
//     $request->session()->regenerateToken();
//     return redirect('/login');
// }
 
}
