<?php

namespace App\Http\Controllers;

use App\Models\complain;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginform()
    {
        return view('login');
    }
    public function login(Request $reguest)
    {
        $credentials = $reguest->validate(
            [
                'email' => 'required |email',
                'password' => 'required |min:6'
            ]
        );
        if (Auth::attempt($credentials)) {
            $reguest->session()->regenerate();
            return redirect('homeadmin')->with('success', 'Login Successfully. Welcome ' . Auth::user()->name);
        }
        return back()->withErrors(
            ['email' => 'Email Not Found!']
        )->onlyInput('email');
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
    public function index(){
        $complains = complain::with(['pelapor', 'kategori']) // jika ada relasi
                    ->latest()
                    ->paginate(10); 

    return view('complaints.list', compact('complains'));
    }
    public function dashboard()
{
     $jumlahPengajuan = Complain::count();
    $jumlahProses = Complain::where('status', 'diproses')->count();
    $jumlahSelesai = Complain::where('status', 'selesai')->count();
    $jumlahDitolak = Complain::where('status', 'ditolak')->count();

    return view('admin.dashboard', compact(
        'jumlahPengajuan',
        'jumlahProses',
        'jumlahSelesai',
        'jumlahDitolak'
    ));
    
}
}
