<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function index(){

        return view('auths.login');

        
    }

    public function postlogin(Request $request){
        // dd($request->all());

        if(Auth::attempt($request->only('name', 'password'))){

            return redirect ('/');
        }

        return redirect('/login');
    }

    public function logout(){


        Auth::logout();

        return redirect('/login');
    }


}
