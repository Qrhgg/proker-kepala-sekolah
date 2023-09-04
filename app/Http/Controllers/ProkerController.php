<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proker;
use App\Models\kategori;
use Illuminate\Support\Facades\DB;
use PDF;


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
    
    public function reportProgramKerjakp(Request $request){

        $kategori = $request->id_kategori ?? null;
        $tahun = $request->tahun ?? null;
        $search = $request->search ?? null;
        $data['id_kategori'] = $kategori;
        $data['tahun'] = $tahun;
        $data['search'] = $search;
        $data['prokers'] = Proker::all();
        $data['kategori'] = kategori::all();
        $data['datas'] = kategori::with(['prokers' => function($q)use($tahun,$search){
            $q->where('status', 1)
            ->when($tahun != null && $tahun != "null", function($q) use($tahun){
                $q->where('tahun', $tahun);
            })
            ->when($search != null && $search != "null", function($q) use($search){
                $q->where('nama_proker', 'LIKE', '%'.$search.'%');
            });
        }])
        ->when($kategori != null && $kategori != "null", function($q) use($kategori){
            $q->where('id', $kategori);
        })
        ->get();
        return view('prokerkp.report', $data);
    }
    
    public function PrintReportProgramKerjakp(Request $request){

        $kategori = $request->id_kategori ?? null;
        $tahun = $request->tahun ?? null;
        $search = $request->search ?? null;
        $data['kategori'] = kategori::all();
        $data['datas'] = kategori::with(['prokers' => function($q)use($tahun,$search){
            $q->where('status', 1)
            ->when($tahun != null && $tahun != "null", function($q) use($tahun){
                $q->where('tahun', $tahun);
            })
            ->when($search != null && $search != "null", function($q) use($search){
                $q->where('nama_proker', 'LIKE', '%'.$search.'%');
            });
        }])
        ->when($kategori != null && $kategori != "null", function($q) use($kategori){
            $q->where('id', $kategori);
        })
        ->get();
        
        $pdf = PDF::loadView('prokerkp.print', $data);
        return $pdf->download('Laporan Program Kerja.pdf');
    }

    public function updatestatus(Request $request, $id){

        $proker = Proker::find($id);

        $proker->status = $request->status;

        $proker->update();

        return redirect('/prokerkp');


    }

}