<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_prodi',
        'deskripsi',
        'photo',
    ];

    public function getNameAttribute()
    {
        return $this->nama_prodi;
    }

    public function perusahaans()
    {
        return $this->belongsToMany(Perusahaan::class, 'perusahaan_prodi');
    }
}
