<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Mahasiswa::create([
            'users_id' => 6, // Ganti dengan id user mahasiswa yang valid
            'nim' => 1,
            'nama' => 'Ahmad Rifqi Zufar Althaf',
            'alamat' => 'Brebes',
            'tgl_lahir' => '2002-10-12',
            'kontak' => '089121212121',
            'email' => 'arifqiza@gmail.com',
            'foto' => 'images/rifqi.png',
            'id_kelas' => 1, // Ganti dengan id kelas yang valid
        ]);

        // Tambahkan entri mahasiswa lainnya sesuai kebutuhan
    }
}
