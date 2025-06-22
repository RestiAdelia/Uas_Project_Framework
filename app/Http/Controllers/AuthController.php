<?php

namespace App\Http\Controllers;

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
            return redirect('home')->with('success', 'Login Successfully. Welcome ' . Auth::user()->name);
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
}
