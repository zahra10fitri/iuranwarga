<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DuesCategory;
use App\Models\DuesMember;

class DuesMemberController extends Controller
{
    public function index()
    {
        $dues = DuesMember::with(['user', 'category'])->get();
        return view('admin.dues-index', compact('dues'));
    }

    public function create()
    {
        $users = User::where('level', 'warga')->get();
        $categories = DuesCategory::all();
        return view('admin.dues-create', compact('users', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required|exists:users,id',
            'idduescategory' => 'required|exists:dues_categories,id',
            'jumlah' => 'required|numeric|min:0',
            'status' => 'required|in:lunas,belum',
        ]);

        DuesMember::create([
            'iduser' => $request->iduser,
            'idduescategory' => $request->idduescategory,
            'jumlah' => $request->jumlah,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.dues.index')->with('success', 'Data iuran berhasil ditambahkan.');
    }
}
