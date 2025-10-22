<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        Mahasiswa::create([
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'nim' => '123456789',
            'prodi_id' => 1,
        ]);

        Mahasiswa::create([
            'id' => 2,
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'nim' => '987654321',
            'prodi_id' => 2,
        ]);
    }
}
