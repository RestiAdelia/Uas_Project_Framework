<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\kategori;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    // Tampilkan semua pengaduan
    public function index()
    {
        $complains = Complain::latest()->paginate(3); // Batas 6 data per halaman
        return view('index', compact('complains'));
    }

    // Form tambah pengaduan (bawa id_pelapor)
    public function create(Request $request)
    {
        $id_pelapor = $request->id_pelapor;
        $categories = kategori::all();
        return view('complaints.complaints', compact('id_pelapor', 'categories'));
    }

    public function store(Request $request)
    {
        // Validasi inputan
        $validated = $request->validate([
            'id_pelapor' => 'required|exists:resti_pelapor,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori_id' => 'required|exists:resti_categories,id',
            'file' => 'nullable|file|mimes:jpg,jpeg,webp|max:2048', // max 2MB
        ]);


        // Simpan data
        $complain = new Complain($validated);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('complain_files', $filename, 'public');
            $complain->file = $path;
        }
        $complain->save();

        return redirect('/')->with('success', 'Data berhasil dikirim!');
    }

    // Form edit pengaduan
    public function edit($id)
    {
        $complain = Complain::findOrFail($id);
        return view('complaints.edit', compact('complain'));
    }

    // Update pengaduan
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'status' => 'required|string',
        ]);

        $complain = Complain::findOrFail($id);
        $complain->update($request->all());

        return redirect()->route('complain.index')->with('success', 'Pengaduan berhasil diupdate!');
    }

    // Hapus pengaduan
    public function destroy($id)
    {
        $complain = Complain::findOrFail($id);
        $complain->delete();

        return redirect()->route('complain.index')->with('success', 'Pengaduan berhasil dihapus!');
    }
}
