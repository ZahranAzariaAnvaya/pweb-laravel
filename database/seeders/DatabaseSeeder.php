<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // ProductSeeder::class,
            //MahasiswaSeeder::class,
            MajorSeeder::class,
            SubjectSeeder::class,
            StudentSeeder::class,
            JadwalSeeder::class,
        ]);
    }
}
