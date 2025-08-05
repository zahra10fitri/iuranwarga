<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // Proses login bisa kamu tambah di sini nanti
        return back()->with('status', 'Login berhasil (dummy)');
    }

    public function register(Request $request)
    {
        // Proses register bisa kamu tambah di sini nanti
        return back()->with('status', 'Register berhasil (dummy)');
    }
}

