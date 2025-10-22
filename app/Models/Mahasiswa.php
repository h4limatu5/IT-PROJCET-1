<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['name', 'email', 'nim', 'prodi_id', 'perusahaan_id', 'photo', 'phone'];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function bimbingans()
    {
        return $this->hasMany(Bimbingan::class);
    }

    public function seminars()
    {
        return $this->hasMany(Seminar::class);
    }

    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }

    public function dokumens()
    {
        return $this->hasMany(Dokumen::class);
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
}
