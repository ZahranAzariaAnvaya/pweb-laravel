<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    public function run()
    {
        $jadwals = [
            [
                'subject_id'  => 1,
                'hari'        => 'Senin',
                'jam_mulai'   => '08:00',
                'jam_selesai' => '10:30',
                'ruangan'     => 'Lab A101',
            ],
            [
                'subject_id'  => 2,
                'hari'        => 'Selasa',
                'jam_mulai'   => '10:00',
                'jam_selesai' => '12:30',
                'ruangan'     => 'Ruang B202',
            ],
            [
                'subject_id'  => 3,
                'hari'        => 'Rabu',
                'jam_mulai'   => '13:00',
                'jam_selesai' => '14:40',
                'ruangan'     => 'Ruang C303',
            ],
            [
                'subject_id'  => 4,
                'hari'        => 'Kamis',
                'jam_mulai'   => '08:00',
                'jam_selesai' => '10:30',
                'ruangan'     => 'Lab D404',
            ],
            [
                'subject_id'  => 5,
                'hari'        => 'Jumat',
                'jam_mulai'   => '10:00',
                'jam_selesai' => '11:40',
                'ruangan'     => 'Ruang E505',
            ],
        ];

        foreach ($jadwals as $jadwal) {
            Jadwal::create($jadwal);
        }
    }
}
