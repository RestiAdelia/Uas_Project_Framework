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
        $request->validate([
            'nama' => 'required|string|max:40',
            'nik' => 'required|string|max:16|min:15',
            'telepon' => 'required|string|max:15',
        ]);

        $pelapor = Pelapor::create($request->all());

       return redirect()->route('complain.create', ['id_pelapor' => $pelapor->id]);
    }
    Public function index(){
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
