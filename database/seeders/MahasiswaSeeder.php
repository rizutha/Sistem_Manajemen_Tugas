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
                'users_id' => 6,
                'nim' => 12221201,
                'nama' => 'Ahmad',
                'alamat' => 'Tegal',
                'tgl_lahir' => '2001-01-01',
                'kontak' => '089123456789',
                'email' => 'muhammad@gmail.com',
                'foto' => 'images/muhammad.png',
                'id_kelas' => 1,
            ],
            [
                'users_id' => 7,
                'nim' => 12221202,
                'nama' => 'Muhammad',
                'alamat' => 'Jakarta',
                'tgl_lahir' => '2001-01-01',
                'kontak' => '089123456789',
                'email' => 'muhammad@gmail.com',
                'foto' => 'images/muhammad.png',
                'id_kelas' => 1,
            ],
            [
                'users_id' => 8,
                'nim' => 12221203,
                'nama' => 'Thabit',
                'alamat' => 'Bandung',
                'tgl_lahir' => '2001-02-02',
                'kontak' => '089123456788',
                'email' => 'thabit@gmail.com',
                'foto' => 'images/thabit.png',
                'id_kelas' => 2,
            ],
            [
                'users_id' => 9,
                'nim' => 12221204,
                'nama' => 'Zuta',
                'alamat' => 'Surabaya',
                'tgl_lahir' => '2001-03-03',
                'kontak' => '089123456787',
                'email' => 'zuta@gmail.com',
                'foto' => 'images/zuta.png',
                'id_kelas' => 2,
            ],
            [
                'users_id' => 10,
                'nim' => 12221205,
                'nama' => 'Marzuban',
                'alamat' => 'Yogyakarta',
                'tgl_lahir' => '2001-04-04',
                'kontak' => '089123456786',
                'email' => 'marzuban@gmail.com',
                'foto' => 'images/marzuban.png',
                'id_kelas' => 3,
            ],
            [
                'users_id' => 11,
                'nim' => 12221206,
                'nama' => 'Idris',
                'alamat' => 'Semarang',
                'tgl_lahir' => '2001-05-05',
                'kontak' => '089123456785',
                'email' => 'idris@gmail.com',
                'foto' => 'images/idris.png',
                'id_kelas' => 3,
            ],
            [
                'users_id' => 12,
                'nim' => 12221207,
                'nama' => 'Alshafii',
                'alamat' => 'Medan',
                'tgl_lahir' => '2001-06-06',
                'kontak' => '089123456784',
                'email' => 'alshafii@gmail.com',
                'foto' => 'images/alshafii.png',
                'id_kelas' => 4,
            ],
            [
                'users_id' => 13,
                'nim' => 12221208,
                'nama' => 'Ikhsan',
                'alamat' => 'Palembang',
                'tgl_lahir' => '2001-07-07',
                'kontak' => '089123456783',
                'email' => 'ikhsan@gmail.com',
                'foto' => 'images/ikhsan.png',
                'id_kelas' => 4,
            ],
            [
                'users_id' => 14,
                'nim' => 12221209,
                'nama' => 'Hanif',
                'alamat' => 'Makassar',
                'tgl_lahir' => '2001-08-08',
                'kontak' => '089123456782',
                'email' => 'hanif@gmail.com',
                'foto' => 'images/hanif.png',
                'id_kelas' => 1,
            ],
            [
                'users_id' => 15,
                'nim' => 12221210,
                'nama' => 'Adi',
                'alamat' => 'Malang',
                'tgl_lahir' => '2001-09-09',
                'kontak' => '089123456781',
                'email' => 'adi@gmail.com',
                'foto' => 'images/adi.png',
                'id_kelas' => 2,
            ],
            [
                'users_id' => 16,
                'nim' => 12221211,
                'nama' => 'Nursalim',
                'alamat' => 'Denpasar',
                'tgl_lahir' => '2001-10-10',
                'kontak' => '089123456780',
                'email' => 'nursalim@gmail.com',
                'foto' => 'images/nursalim.png',
                'id_kelas' => 3,
            ]
        ]);
    }
}
