<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proker;

class ProkerController extends Controller
{
    
    public function index(){

        $proker = Proker::all();


        return view('proker.index', ['proker' => $proker]);

    }


}
