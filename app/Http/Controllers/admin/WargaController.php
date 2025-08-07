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
        $warga = User::where('level', 'warga')->get();
        return view('admin.warga', compact('warga'));
    }

    public function create()
    {
        return view('admin.warga-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:100|unique:users',
            'nohp'     => 'required|string|max:20',
            'address'  => 'required|string',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'nohp'     => $request->nohp,
            'address'  => $request->address,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'level'    => 'warga',
        ]);

        return redirect()->route('admin.warga')->with('success', 'Data warga berhasil ditambahkan.');
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
    $warga = User::where('level', 'warga')->findOrFail($id);
    $warga->delete();

    return redirect()->route('admin.warga')->with('success', 'Data warga berhasil dihapus.');
}

}
