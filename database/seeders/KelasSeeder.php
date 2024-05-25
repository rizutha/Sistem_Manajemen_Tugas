<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelas::create([
            'wali_kelas' => 1, // Dari tabel dosens
            'kelas' => '12.1B.35',
            'prodi' => 'Sistem Informasi',
            'semester' => '1',
        ]);

        Kelas::create([
            'wali_kelas' => 2, // Dari tabel dosens
            'kelas' => '12.2B.35',
            'prodi' => 'Sistem Informasi',
            'semester' => '2',
        ]);

        Kelas::create([
            'wali_kelas' => 3, // Dari tabel dosens
            'kelas' => '12.1C.35',
            'prodi' => 'Sistem Informasi Akuntansi',
            'semester' => '1',
        ]);

        Kelas::create([
            'wali_kelas' => 4, // Dari tabel dosens
            'kelas' => '13.1A.35',
            'prodi' => 'Teknik Informatika',
            'semester' => '1',
        ]);
    }
}
