<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Illuminate\Http\Request;

class JumlahPengaduanController extends Controller
{
     public function index()
    {
        $jumlahPengajuan = Complain::where('status', '!=', 'ditolak')->count();

        $jumlahProses = Complain::where('status', 'proses')->count();
        $jumlahSelesai = Complain::where('status', 'selesai')->count();
        $jumlahDitolak = Complain::where('status', 'ditolak')->count();

        $complains = Complain::latest()->paginate(6);

        return view('index', compact(
            'jumlahPengajuan',
            'jumlahProses',
            'jumlahSelesai',
            'jumlahDitolak',
            'complains'
        ));
    }
}
