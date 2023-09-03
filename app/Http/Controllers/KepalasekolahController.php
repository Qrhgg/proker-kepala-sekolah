<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kepalasekolah;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class KepalasekolahController extends Controller
{
    public function index(){


        $kepala_sekolah = Kepalasekolah::all();


        return view('kepalasekolah.index', ['kepala_sekolah' => $kepala_sekolah]);

    }

    public function store(Request $request){

        $user = new User;

        $user->role = "kepala_sekolah";
        $user->name = $request->nama_kepalasekolah;
        $user->email = $request->nama_kepalasekolah . " "  . "@gmail.com";
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();



        $kepala_sekolah = Kepalasekolah::create([
            'user_id' => $user->id,
            'nip'      => $request->nip,
            'nama_kepalasekolah' => $request->nama_kepalasekolah,
            'alamat' => $request->alamat,
            'no_hp'    => $request->no_hp,



        ]);

        return redirect('/kepalasekolah');

    }


    public function update(Request $request, $id){

        $kepalasekolah = Kepalasekolah::find($id);
        $kepalasekolah->update($request->all());
        $user = DB::table('users')
        ->where('id', $kepalasekolah->user_id)
        ->update([
            'name' => $request->nama_kepalasekolah,

            'password' => bcrypt ($request->password)
        
        ]);

        return redirect('/kepalasekolah');
        


    }

    public function hapus($id){

        $kepalasekolah = Kepalasekolah::find($id);
        $user = User::where('id', $kepalasekolah->user_id)->delete();

        $kepalasekolah->delete();


        return redirect('/kepalasekolah');

    }


}
