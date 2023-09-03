<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proker;
use App\Models\kategori;

class ProkerController extends Controller
{
    
    public function index(){

        $proker = Proker::all();
        $kategori = kategori::all();


        return view('proker.index', ['proker' => $proker, 'kategori' => $kategori]);

    }

    public function store(Request $request){

        $proker = Proker::create($request->all());

        return redirect('/proker');

    }

    public function hapus($id){

        $proker = Proker::find($id);

        $proker->delete();


        return redirect ('/proker');



    }

}
