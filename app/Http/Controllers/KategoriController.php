<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;

class KategoriController extends Controller
{

    public function index(){

        $kategori = kategori::all();




        return view('kategori.index', ['kategori' => $kategori]);
    }

    public function store(Request $request){

        $kategori=kategori::create($request->all());

        return redirect('/kategori');

    }


    public function hapus($id){

         $kategori = kategori::find($id);

         $kategori->delete();

         return redirect ('/kategori');


    }

    public function update (Request $request, $id){

         $kategori = kategori::find($id);


            $kategori->update($request->all());

        return redirect('/kategori');


    }

}
