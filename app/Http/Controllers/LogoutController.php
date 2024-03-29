<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Builder\Function_;

class LogoutController extends Controller
{
    //
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
