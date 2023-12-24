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
    public function run(): void
    {
        Mahasiswa::insert([
            [
                'nim' => '12121212',
                'nama' => 'Rifqi',
                'alamat' => 'Brebes',
                'tgl_lahir' => '2002-10-12',
                'kontak' => '089121212121',
                'email' => 'rifqi@gmail.com',
                'prodi' => 'Sistem Informasi',
                'semester' => '1',
                'foto' => 'images/rifqi.png',
                'users_id' => '3',
            ],
        ]);
    }
}
