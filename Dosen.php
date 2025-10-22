<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = ['name', 'email', 'nip', 'prodi_id', 'photo', 'phone'];

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
}
