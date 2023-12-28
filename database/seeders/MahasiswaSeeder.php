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
                'nim' => '12221277',
                'nama' => 'Ahmad Rifqi Zufar Althaf',
                'alamat' => 'Brebes',
                'tgl_lahir' => '2002-10-12',
                'kontak' => '089121212121',
                'email' => 'rifqi@gmail.com',
                'prodi' => 'Sistem Informasi',
                'semester' => '1',
                'foto' => 'images/rifqi.png',
                'users_id' => '3',
            ],
            [
                'nim' => '12221362',
                'nama' => 'Jacob Jockey Saputra',
                'alamat' => 'Tegal',
                'tgl_lahir' => '2005-01-15',
                'kontak' => '089121212121',
                'email' => 'jacob@gmail.com',
                'prodi' => 'Sistem Informasi',
                'semester' => '3',
                'foto' => 'images/jacob.png',
                'users_id' => '3',
            ],
            [
                'nim' => '12221283',
                'nama' => 'Kulum Fatmawati',
                'alamat' => 'Tegal',
                'tgl_lahir' => '2004-03-14',
                'kontak' => '089121212121',
                'email' => 'kulum@gmail.com',
                'prodi' => 'Sistem Informasi',
                'semester' => '3',
                'foto' => 'images/kulum.png',
                'users_id' => '3',
            ],
            [
                'nim' => '12221531',
                'nama' => 'Khasnah Maesaroh',
                'alamat' => 'Pemalang',
                'tgl_lahir' => '2002-10-31',
                'kontak' => '089121212121',
                'email' => 'khasnah@gmail.com',
                'prodi' => 'Sistem Informasi',
                'semester' => '3',
                'foto' => 'images/khasnah.png',
                'users_id' => '3',
            ],
            [
                'nim' => '12221435',
                'nama' => 'Ivana Amanda Putri',
                'alamat' => 'Tegal',
                'tgl_lahir' => '2003-08-04',
                'kontak' => '089121212121',
                'email' => 'ivana@gmail.com',
                'prodi' => 'Sistem Informasi',
                'semester' => '3',
                'foto' => 'images/ivana.png',
                'users_id' => '3',
            ],
        ]);
    }
}
