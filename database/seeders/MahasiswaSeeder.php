<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mahasiswas')->insert([
            [
                'nama'       => 'Zahran Azaria',
                'nim'        => '2411531005',
                'jurusan'    => 'Informatika',
                'angkatan'   => '2024',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
