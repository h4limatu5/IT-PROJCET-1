<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_perusahaan',
        'alamat',
        'provinsi',
        'telepon',
        'email',
        'logo',
        'jurusan',
        'deskripsi',
    ];

    public function prodis()
    {
        return $this->belongsToMany(Prodi::class, 'perusahaan_prodi');
    }

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
