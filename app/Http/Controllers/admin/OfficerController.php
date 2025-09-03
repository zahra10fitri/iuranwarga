<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Officer;  
use App\Models\Payment; 

class OfficerController extends Controller
{
//    public function index()
//     {
//         $officers = Officer::with('user')->get();
//         $payments = Payment::with(['user'])->get();
//         return view('admin.officer', compact('officers', 'payments'));
//     }
   
// public function index()
// {
//     $officers = Officer::with('user')->get();
//     return view('admin.officer', compact('officers'));
//     $officers = User::where('level', 'officer')->get();
//     return view('admin.officer', compact('officers'));
// }

public function index()
{
    $officers = User::where('level', 'officer')->get();
    return view('admin.officer', compact('officers'));
}



    public function create()
    {
        return view('admin.officer-create');
    }
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'nohp' => 'required|string|max:20',
        'address' => 'required|string',
        'level' => 'required|in:officer'
    ]);

    User::create([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'password' => bcrypt($request->password), // jangan lupa hash password
        'nohp' => $request->nohp,
        'address' => $request->address,
        'level' => $request->level,
    ]);

    return redirect()->route('admin.officer')->with('success', 'Officer berhasil ditambahkan.');
}

    public function edit($id)
    {
        $officer = User::findOrFail($id);
        return view('admin.officer-edit', compact('officer'));
    }

    public function update(Request $request, $id)
    {
        $officer = User::findOrFail($id);

        $request->validate([
            'name'     => 'required',
            'username' => 'required|unique:users,username,' . $officer->id,
            'email'    => 'required|email|unique:users,email,' . $officer->id,
            'nohp'     => 'required',
            'address'  => 'required',
        ]);

        $officer->update([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'nohp'     => $request->nohp,
            'address'  => $request->address,
        ]);

        return redirect()->route('admin.officer')->with('success', 'Petugas berhasil diperbarui');
    }

    public function destroy($id)
    {
        $officer = User::findOrFail($id);
        $officer->delete();

        return redirect()->route('admin.officer')->with('success', 'Petugas berhasil dihapus');
    }
}
