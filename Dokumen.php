<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Dokumen extends Model
{
    protected $fillable = ['mahasiswa_id', 'title', 'description', 'file_path', 'status', 'validated_by', 'validated_at'];

    protected $dates = ['validated_at'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function kaprodi()
    {
        return $this->belongsTo(Kaprodi::class, 'validated_by');
    }
}
