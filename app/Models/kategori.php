<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proker;
use Illuminate\Database\Eloquent\Relations\HasMany;

class kategori extends Model
{
    // use HasFactory;

    protected $table ="kategori";
    protected $fillable = ['nama_kategori'];

    /**
     * Get all of the comments for the kategori
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prokers(): HasMany
    {
        return $this->hasMany(Proker::class, 'id_kategori', 'id');
    }

}
