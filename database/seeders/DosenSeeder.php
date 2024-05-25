<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dosen::insert([
            [
                'nip' => '1',
                'nama' => 'Husni Faqih',
                'codename' => 'HNF',
                'tgl_lahir' => '1999-01-10',
                'alamat' => 'Tegal',
                'kontak' => '087232323232',
                'email' => 'hnf@gmail.com',
                'keilmuan' => 'Sistem Informasi',
                'foto' => 'images/husni1.png',
                'users_id' => '2',
            ],
            [
                'nip' => '2',
                'nama' => 'Husni Mubarok',
                'codename' => 'HUB',
                'tgl_lahir' => '1999-01-10',
                'alamat' => 'Tegal',
                'kontak' => '087232323232',
                'email' => 'hub@gmail.com',
                'keilmuan' => 'Sistem Informasi',
                'foto' => 'images/husni2.png',
                'users_id' => '3',
            ],
            [
                'nip' => '3',
                'nama' => 'Sopian Aji',
                'codename' => 'SOP',
                'tgl_lahir' => '1999-01-10',
                'alamat' => 'Tegal',
                'kontak' => '087232323232',
                'email' => 'sop@gmail.com',
                'keilmuan' => 'Sistem Informasi',
                'foto' => 'images/sopian.png',
                'users_id' => '4',
            ],
            [
                'nip' => '4',
                'nama' => 'Fanny Fatma Wati',
                'codename' => 'FFW',
                'tgl_lahir' => '1999-01-10',
                'alamat' => 'Purwokerto',
                'kontak' => '087232323232',
                'email' => 'ffw@gmail.com',
                'keilmuan' => 'Sistem Informasi',
                'foto' => 'images/fanny.png',
                'users_id' => '5',
            ],
        ]);
    }
}
