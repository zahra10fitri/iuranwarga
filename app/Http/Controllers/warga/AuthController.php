<?php

namespace App\Http\Controllers\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function showRegister()
    {
        return view('register');
    }

public function login(Request $request)
{
    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);

    $login = $request->input('email'); 
    $password = $request->input('password');

    // Cek apakah input adalah email atau username
    $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

    if (Auth::attempt([$field => $login, 'password' => $password])) {
        $request->session()->regenerate();

        // Cek level user setelah login
        $user = Auth::user();
        if ($user->level === 'admin') {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('beranda');
        }
    }

    return back()->with('status', 'Email / Username atau Password salah!');
}


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nohp' => '-',       // default
            'address' => '-',    // default
            'level' => 'warga',  // default
        ]);

        Auth::login($user); // login otomatis

        return redirect()->route('beranda'); // ke halaman beranda
    }
}
