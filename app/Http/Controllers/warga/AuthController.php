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

        if ($user->level === 'warga') {
            return redirect()->route('warga.dashboard');  // ✅ ke dashboard warga
        } else {
            return redirect()->route('admin.dashboard');  // ✅ ke dashboard admin/petugas
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

    // proses login
//     public function login(Request $request)
//     {
//         $credentials = $request->only('email', 'password');

//         if (Auth::attempt($credentials)) {
//             $user = Auth::user();

//            if ($user->level === 'warga') {
//         return redirect()->to('/beranda');
//     } else {
//         // semua level selain warga dianggap petugas
//         return redirect()->to('/dashboard');
//     }
//  }

//         return back()->with('status', 'Email atau password salah!');
//     }

//     // proses register
//     public function register(Request $request)
//     {
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'username' => 'required|string|max:255|unique:users,username',
//             'email' => 'required|email|max:255|unique:users,email',
//             'password' => 'required|string|min:6|confirmed',
//             'level' => 'required|string|in:warga,petugas', // ✅ wajib pilih role
//         ]);

//         $user = User::create([
//             'name' => $request->name,
//             'username' => $request->username,
//             'email' => $request->email,
//             'password' => Hash::make($request->password),
//             'nohp' => '-',       // default
//             'address' => '-',    // default
//             'level' => $request->level, // ✅ simpan sesuai pilihan
//         ]);

//         Auth::login($user); // login otomatis setelah daftar

//         if ($user->level === 'warga') {
//         return redirect()->to('/beranda');
//     } else {
//         // semua level selain warga dianggap petugas
//         return redirect()->to('/dashboard');
// }
//     }

//     // logout
//     public function logout(Request $request)
//     {
//         Auth::logout();
//         $request->session()->invalidate();
//         $request->session()->regenerateToken();
//         return redirect('/login');
//     }
}
