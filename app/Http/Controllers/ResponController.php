<?php

namespace App\Http\Controllers;

use App\Models\complain;
use App\Models\respons;
use Illuminate\Http\Request;

class ResponController extends Controller
{
    public function create($id_complain)
    {
        return view('respons.create', compact('id_complain'));
    }
    public function index()
    {
        $respons = Respons::paginate(10);
        return view('respons.index', compact('respons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_complain' => 'required|exists:complain,id',
            'respon' => 'required|string',
        ]);

        respons::create($request->all());

        return redirect()->route('complain.index')->with('success', 'Respon berhasil ditambahkan!');
    }
    public function show($id)
    {
        $complain = complain::with('respon')->findOrFail($id);
        return view('respon', compact('complain'));
    }
    public function destroy($id)
    {
        $respon = Respons::findOrFail($id);
        $respon->delete();

        return redirect()->route('respon.index')->with('success', 'Respon berhasil dihapus!');
    }
}
