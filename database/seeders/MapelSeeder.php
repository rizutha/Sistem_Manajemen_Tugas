<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mapel::create([
            'id_kelas' => 1, // Dari tabel dosens
            'dosen_pengajar' => 3,
            'prodi' => 'Sistem Informasi',
            'nama_matkul' => 'Dasar Pemrograman',
        ]);
    }
}
