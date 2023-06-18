<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auths.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if(Auth::attempt($credentials) && Auth::user()->role_id == 1){
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }else if(Auth::attempt($credentials) && Auth::user()->role_id == 2){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->with('error', 'Login failed!');
    }

    public function logout(Request $request)
    {
        if(Auth::check()){
            Auth::logout();
            $request->session()->invalidate();
        }
        return redirect('/login');
    }
}
