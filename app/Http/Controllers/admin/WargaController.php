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
    $warga = User::where('level', 'warga')->findOrFail($id);
    return view('admin.warga.edit', compact('warga'));
}

public function update(Request $request, $id)
{
    $warga = User::where('level', 'warga')->findOrFail($id);

    $request->validate([
        'name'     => 'required|string|max:255',
        'username' => 'required|string|max:100|unique:users,username,' . $warga->id,
        'nohp'     => 'required|string|max:20',
        'address'  => 'required|string',
        'email'    => 'required|email|unique:users,email,' . $warga->id,
        'password' => 'nullable|string|min:6',
    ]);

    $warga->update([
        'name'     => $request->name,
        'username' => $request->username,
        'nohp'     => $request->nohp,
        'address'  => $request->address,
        'email'    => $request->email,
        'password' => $request->password ? bcrypt($request->password) : $warga->password,
    ]);

    return redirect()->route('admin.warga')->with('success', 'Data warga berhasil diperbarui.');
}

public function destroy($id)
{
    $warga = User::all(); // Menampilkan semua user: baik admin maupun warga
    $warga->delete();

    return redirect()->route('admin.warga')->with('success', 'Data warga berhasil dihapus.');
}

}
