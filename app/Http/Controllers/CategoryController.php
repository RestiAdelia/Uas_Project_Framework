<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CategoryController extends Controller
{
    // Menampilkan semua kategori
    public function index()
    {
        $categories = Kategori::latest()->paginate(10);
        return view('categories.index', compact('categories'));
    }

    // Menampilkan form tambah kategori
    public function create()
    {
        return view('categories.create');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:resti_categories,nama_kategori',
        ]);

        Kategori::create($validated);


        Kategori::create($validated);

        return redirect()->route('category.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Menampilkan form edit kategori
    public function edit($id)
    {
        $category = Kategori::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    // Memperbarui kategori
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:resti_categories,nama_kategori,' . $id,
        ]);

        $category = Kategori::findOrFail($id);
        $category->update($validated);
        return redirect()->route('category.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        try {
            $category = Kategori::findOrFail($id);
            $category->delete();

            return redirect()->route('category.index')->with('success', 'Kategori berhasil dihapus.');
        } catch (QueryException $e) {
            return redirect()->route('category.index')->with('error', 'Kategori tidak bisa dihapus karena masih digunakan di data lain.');
        }
    }
}
