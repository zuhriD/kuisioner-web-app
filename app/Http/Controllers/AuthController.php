<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $sudah_isi = '';
        return view('auths.index', compact('sudah_isi'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $attempt = Auth::attempt($credentials);

        if ($attempt && Auth::user()->role_id == 1) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        } else if ($attempt && Auth::user()->role_id == 2) {
            $cek_kuisioner = Result::where('user_id', Auth::user()->id)->first();
            if (!$cek_kuisioner) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }
            else{
            $sudah_isi = 'Anda sudah mengisi kuisioner';
            return view('auths.index', compact('sudah_isi'));
            }
        }

        return back()->with('error', 'Username atau Password Salah!');
    }


    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
        }
        return redirect('/login');
    }
}
