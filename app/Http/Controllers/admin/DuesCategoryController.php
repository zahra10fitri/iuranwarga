<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DuesCategory;
use Illuminate\Http\Request;

class DuesCategoryController extends Controller
{
    // Menampilkan semua kategori
    public function index()
    {
        $categories = DuesCategory::all();
        return view('admin.categories', compact('categories'));
    }

    // Form tambah kategori
    public function create()
    {
        return view('admin.categories-create');
    }

    // Simpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'period' => 'required|string',
            'nominal' => 'required|numeric',
            'status' => 'required|string',
        ]);

        DuesCategory::create([
            'period' => $request->period,
            'nominal' => $request->nominal,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.categories')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Form edit kategori
    public function edit($id)
    {
        $category = DuesCategory::findOrFail($id);
        return view('admin.categories-edit', compact('category'));
    }

    // Update kategori
    public function update(Request $request, $id)
    {
        $request->validate([
            'period' => 'required|string',
            'nominal' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $category = DuesCategory::findOrFail($id);
        $category->update([
            'period' => $request->period,
            'nominal' => $request->nominal,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.categories')->with('success', 'Kategori berhasil diperbarui.');
    }

    // Hapus kategori
    public function destroy($id)
    {
        $category = DuesCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories')->with('success', 'Kategori berhasil dihapus.');
    }
}
