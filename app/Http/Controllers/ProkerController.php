<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proker;
use App\Models\kategori;
use Illuminate\Support\Facades\DB;


class ProkerController extends Controller
{
    
    public function index(){
        $data['prokers'] = Proker::all();
        $data['datas'] = kategori::with('prokers')->get();
        return view('proker.index', $data);
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


    public function update(Request $request,$id){

        $proker = Proker::find($id);
        // dd($request->all());
        $proker->update($request->all());

            return redirect('/proker');


    }

    public function showkp(){

        $data['prokers'] = Proker::all();
        $data['datas'] = kategori::with('prokers')->get();
        return view('prokerkp.index', $data);

        // return view('prokerkp.index', ['proker' => $proker]);

    }

    public function updatestatus(Request $request, $id){

        $proker = Proker::find($id);

        $proker->status = $request->status;

        $proker->update();

        return redirect('/prokerkp');


    }

}