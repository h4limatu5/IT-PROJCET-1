<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    public function run()
    {
        Prodi::create([
            'id' => 1,
            'nama_prodi' => 'Teknik Informatika',
            'deskripsi' => 'Program studi teknik informatika',
            'photo' => null,
        ]);

        Prodi::create([
            'id' => 2,
            'nama_prodi' => 'Sistem Informasi',
            'deskripsi' => 'Program studi sistem informasi',
            'photo' => null,
        ]);
    }
}
