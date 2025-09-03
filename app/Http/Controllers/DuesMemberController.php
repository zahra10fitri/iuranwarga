<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DuesCategory;
use App\Models\DuesMember;
use App\Models\Payment;


class DuesMemberController extends Controller
{
    public function index()
    {
       $dues = DuesMember::with(['user','category'])->get();
        return view('admin.dues', compact('dues'));

    }

    public function create()
    {
        $users = User::where('level', 'warga')->get();
        $categories = DuesCategory::all();
        return view('admin.dues-create', compact('users', 'categories'));
    }

public function store(Request $request)
{
    DuesMember::create([
        'iduser' => $request->iduser,
        'idduescategory' => $request->idduescategory,
    ]);

    Payment::create([
        'iduser' => $request->iduser,
        'idduescategory' => $request->idduescategory,
        'nominal' => $request->nominal,
        'status' => 'belum bayar',
        'petugas' => auth()->user()->id ?? null, // isi sesuai login user
    ]);

    return redirect()->route('admin.dues')->with('success', 'Data iuran berhasil ditambahkan!');
}

}
