<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLogin()
    {
        return view('login');
    }

    // Tampilkan form register
    public function showRegister()
    {
        return view('register');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Bisa login pakai email atau username
        $loginField = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$loginField => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user->level === 'warga') {
                return redirect()->route('warga.dashboard');
            } else {
                return redirect()->route('admin.dashboard');
            }
        }

        return back()->with('status', 'Email/Username atau password salah!');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'level' => 'required|string|in:warga,petugas',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nohp' => '-',       // default
            'address' => '-',    // default
            'level' => $request->level,
        ]);

        Auth::login($user); // Login otomatis setelah daftar

        if ($user->level === 'warga') {
            return redirect()->route('warga.dashboard');
        } else {
            return redirect()->route('admin.dashboard');
        }
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
