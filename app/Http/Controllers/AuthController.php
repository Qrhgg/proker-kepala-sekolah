<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function index()
    {

        return view('auths.login');
    }

    public function postlogin(Request $request)
    {

        if (Auth::attempt($request->only('name', 'password'))) {
            if (Auth::user()->role == 'kepala_sekolah') {
                return redirect('/prokerkp');
            } else {
                return redirect('/kepalasekolah');
            }
        }

        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
