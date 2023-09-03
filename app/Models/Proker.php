<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\kategori;

class Proker extends Model
{
    // use HasFactory;


    protected $table = "proker";
    protected $fillable = ['id_kategori', 'nama_proker', 'anggaran', 'status', 'semester', 'tahun'];
    protected $dates = ['tahun'];


    public function kategori(){

        return $this->belongsTo(kategori::class, 'id_kategori');
    }


}
