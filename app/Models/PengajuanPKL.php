<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanPKL extends Model
{
    protected $fillable = [
        'mahasiswa_id',
        'perusahaan_id',
        'description',
        'status',
        'approved_by',
        'validator_type',
        'approved_at'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }

    public function validator()
    {
        if ($this->validator_type === 'kaprodi') {
            return $this->belongsTo(Kaprodi::class, 'approved_by');
        } elseif ($this->validator_type === 'dosen') {
            return $this->belongsTo(Dosen::class, 'approved_by');
        }
        return null;
    }
}
