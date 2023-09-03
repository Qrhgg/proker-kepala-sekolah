<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepalasekolah extends Model
{

    protected $table = "kepalasekolah";
    protected $fillable = ['user_id', 'nip', 'nama_kepalasekolah', 'alamat', 'no_hp'];
    // use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
