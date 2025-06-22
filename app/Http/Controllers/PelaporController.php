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
            'nik' => 'required|string|max:16',
            'telepon' => 'required|string|max:15',
        ]);

        $pelapor = Pelapor::create($request->all());

       return redirect()->route('complain.create', ['id_pelapor' => $pelapor->id]);
    }
}
