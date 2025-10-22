<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kaprodi extends Model
{
    protected $fillable = ['name', 'email', 'nip', 'prodi_id'];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function dokumens()
    {
        return $this->hasMany(Dokumen::class, 'validated_by');
    }
}
