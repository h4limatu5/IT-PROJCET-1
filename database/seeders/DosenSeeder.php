<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    public function run()
    {
        Dosen::create([
            'id' => 1,
            'name' => 'Dr. Ahmad',
            'email' => 'ahmad@example.com',
            'nip' => '1234567890',
            'prodi_id' => 1,
        ]);

        Dosen::create([
            'id' => 2,
            'name' => 'Prof. Budi',
            'email' => 'budi@example.com',
            'nip' => '0987654321',
            'prodi_id' => 2,
        ]);
    }
}
