<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function showLogin() {
        if(Auth::user()) {
            return redirect()->route('home');
        }

        return view('login');
    }

    public function login(Request $request) {
        $isMatch = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if(!$isMatch) {
            return redirect()->route('login')->with('error', 'Email atau password Anda salah!');
        }

        return redirect()->route('home');
    }
}
