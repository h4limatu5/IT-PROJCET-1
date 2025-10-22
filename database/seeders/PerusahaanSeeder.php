<?php

namespace Database\Seeders;

use App\Models\Perusahaan;
use Illuminate\Database\Seeder;

class PerusahaanSeeder extends Seeder
{
    public function run()
    {
        Perusahaan::create([
            'id' => 1,
            'nama_perusahaan' => 'PT. ABC Tech',
            'alamat' => 'Jl. Teknologi No. 1',
            'provinsi' => 'DKI Jakarta',
            'telepon' => '021-12345678',
            'email' => 'contact@abc-tech.com',
            'jurusan' => 'Teknik Informatika',
        ]);

        Perusahaan::create([
            'id' => 2,
            'nama_perusahaan' => 'CV. XYZ Solutions',
            'alamat' => 'Jl. Inovasi No. 2',
            'provinsi' => 'Jawa Barat',
            'telepon' => '022-87654321',
            'email' => 'info@xyz-solutions.com',
            'jurusan' => 'Sistem Informasi',
        ]);
    }
}
