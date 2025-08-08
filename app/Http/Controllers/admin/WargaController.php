<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class WargaController extends Controller
{
    public function index()
    {
        $warga = User::all(); 
        return view('admin.warga', compact('warga'));
    }

    public function create()
    {
        return view('admin.warga-create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'username' => 'required|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'nohp' => 'required',
        'address' => 'required',
        'level' => 'required|in:admin,warga',
    ]);

    User::create([
        'name' => $validated['name'],
        'username' => $validated['username'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
        'nohp' => $validated['nohp'],
        'address' => $validated['address'],
        'level' => $validated['level'],
    ]);

    return redirect()->route('admin.warga.index')->with('success', 'Warga berhasil ditambahkan.');

    }
public function edit($id)
{
    $warga = User::findOrFail($id);
    return view('admin.warga-edit', compact('warga'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'nohp' => 'required',
        'address' => 'required',
        'level' => 'required'
    ]);

    $warga = User::findOrFail($id);
    $warga->update($request->all());

    return redirect()->route('admin.warga')->with('success', 'Data warga berhasil diperbarui');
}


public function destroy($id)
{
    $warga = User::findOrFail($id); // Kalau modelnya User
    $warga->delete();

    return redirect()->route('admin.warga')->with('success', 'Data warga berhasil dihapus.');
}



}
