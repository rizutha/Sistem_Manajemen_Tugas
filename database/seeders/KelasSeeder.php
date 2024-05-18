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
            'wali_kelas' => 1, // Ganti 1 dengan ID dosen yang ada di tabel dosens
            'kelas' => '12.1B.35',
            'prodi' => 'Sistem Informasi',
            'semester' => '1',
        ]);

        Kelas::create([
            'wali_kelas' => 2, // Ganti 1 dengan ID dosen yang ada di tabel dosens
            'kelas' => '12.2B.35',
            'prodi' => 'Sistem Informasi',
            'semester' => '2',
        ]);

        // Tambahkan entri kelas lainnya sesuai kebutuhan
    }
}
