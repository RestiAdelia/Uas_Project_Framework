<?php

namespace App\Http\Controllers;

use App\Models\Pelapor;
use Illuminate\Http\Request;

class PelaporController extends Controller
{
    public function create()
    {
        
        return view('pelapor.create');
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:40',
        'nik' => 'required|string|max:16|min:15',
        'telepon' => 'required|string|max:15',
    ]);

    // Cari pelapor berdasarkan NIK
    $pelapor = Pelapor::where('nik', $validated['nik'])->first();

    if ($pelapor) {
        // Jika pelapor ditemukan, langsung lanjut ke form pengaduan
        return redirect()->route('complain.create', ['id_pelapor' => $pelapor->id])
            ->with('success', 'NIK sudah terdaftar sebagai: ' . $pelapor->nama . '. Lanjutkan ke form pengaduan.');
    }

    // Jika tidak ditemukan, buat pelapor baru
    $pelapor = Pelapor::create($validated);

    return redirect()->route('complain.create', ['id_pelapor' => $pelapor->id])
        ->with('success', 'Data pelapor berhasil disimpan. Silakan lanjutkan pengaduan.');
}


    public function index()
    {
        $pelapor = Pelapor::paginate(10); // contoh: 10 data per halaman

        return view('pelapor.list', compact('pelapor'));
    }

    public function destroy($id)
    {
        $pelapor = pelapor::findOrFail($id);
        $pelapor->delete();

        return redirect()->route('pelapor.index')->with('success', 'Pelapor berhasil dihapus!');
    }
}
