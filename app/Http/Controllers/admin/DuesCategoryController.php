<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DuesCategory;

class DuesCategoryController extends Controller
{
    public function index()
    {
        $categories = DuesCategory::all();
        return view('admin.categories', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        DuesCategory::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(DuesCategory $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, DuesCategory $category)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.categories')->with('success', 'Kategori berhasil diupdate.');
    }

    public function destroy(DuesCategory $category)
    {
        $category->delete();
        return redirect()->route('admin.categories')->with('success', 'Kategori berhasil dihapus.');
    }
}
