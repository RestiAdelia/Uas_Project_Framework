<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoryController extends Controller
{
    public function create(Request $request)
{
    $id_pelapor = $request->id_pelapor;
    $categories = kategori::all(); 

    return view('complaints.complaints', compact('id_pelapor', 'categories'));
}
}
