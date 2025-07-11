<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\kategori;
use App\Models\respons;
use App\Models\pelapor;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    // Tampilkan semua pengduan
    public function index()
    {
        $complains = Complain::latest()->paginate(6);
        return view('index', compact('complains'));
    }

    public function show($id)
    {
        $complain = Complain::with('responses')->findOrFail($id);
        return view('complaints.detail', compact('complain'));
    }
    public function list()
    {
        $complains = Complain::latest()->paginate(10);
        return view('complaints.list', compact('complains'));
    }

    // Form tambah pengaduan (bawa id_pelapor)
    public function create($id_pelapor)
    {
        $pelapor = Pelapor::findOrFail($id_pelapor); // ambil data pelapor

        $categories = Kategori::all();
        $complains = Complain::latest()->paginate(10);

        return view('complaints.complaints', compact('id_pelapor', 'categories', 'complains', 'pelapor'));
    }


    public function store(Request $request)
    {
        // Validasi inputan
        $validated = $request->validate([
            'id_pelapor' => 'required|exists:resti_pelapor,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
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
    // Tampilkan form respon
    public function formRespon($id)
    {
        $complain = Complain::with('responses')->findOrFail($id);
        return view('respons.create', compact('complain'));
    }

    // Proses kirim respon
    public function kirimRespon(Request $request, $id)
    {
        $request->validate([
            'respon' => 'required|string',
        ]);

        Respons::create([
            'complain_id' => $id,
            'respon' => $request->respon
        ]);

        // Setelah submit, balik ke daftar complain
        return redirect()->route('complaints.list')->with('success', 'Respon berhasil dikirim!');
    }


    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:terkirim,proses,selesai,ditolak'
        ]);

        $complain = Complain::findOrFail($id);
        $complain->status = $request->status;
        $complain->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }


    // Hapus pengaduan
    public function destroy($id)
    {
        $complain = Complain::findOrFail($id);
        $complain->delete();

        return redirect()->route('complaints.list')->with('success', 'Pengaduan berhasil dihapus!');
    }
}
