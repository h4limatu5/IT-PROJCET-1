<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Dokumen extends Model
{
    protected $fillable = ['mahasiswa_id', 'title', 'description', 'file_path', 'status', 'validated_by', 'validated_at', 'validator_type'];

    protected $dates = ['validated_at'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function validator()
    {
        if ($this->validator_type === 'kaprodi') {
            return $this->belongsTo(Kaprodi::class, 'validated_by');
        } elseif ($this->validator_type === 'dosen') {
            return $this->belongsTo(Dosen::class, 'validated_by');
        }
        return null;
    }

    public function getValidatorAttribute()
    {
        if ($this->validator_type === 'kaprodi') {
            return Kaprodi::find($this->validated_by);
        } elseif ($this->validator_type === 'dosen') {
            return Dosen::find($this->validated_by);
        }
        return null;
    }
}
