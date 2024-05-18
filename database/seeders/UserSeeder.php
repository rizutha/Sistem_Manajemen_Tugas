<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name'=>'Admin',
                'username'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('admin123'),
                'role'=>'admin',
            ],
            [
                'name'=>'Husni Faqih',
                'username'=>'hnf',
                'email'=>'hnf@gmail.com',
                'password'=>bcrypt('hnf12345'),
                'role'=>'dosen',
            ],
            [
                'name'=>'Husni Mubarok',
                'username'=>'hub',
                'email'=>'hub@gmail.com',
                'password'=>bcrypt('hub12345'),
                'role'=>'dosen',
            ],
            [
                'name'=>'Sopian Aji',
                'username'=>'sop',
                'email'=>'sop@gmail.com',
                'password'=>bcrypt('sop12345'),
                'role'=>'dosen',
            ],
            [
                'name'=>'Fanny Fatma Wati',
                'username'=>'ffw',
                'email'=>'ffw@gmail.com',
                'password'=>bcrypt('ffw12345'),
                'role'=>'dosen',
            ],
            [
                'name'=>'Ahmad Rifqi Zufar Althaf',
                'username'=>'rifqi',
                'email'=>'rifqi@gmail.com',
                'password'=>bcrypt('rifqi123'),
                'role'=>'mahasiswa',
            ],
            // [
            //     'name'=>'Jacob Jockey Saputra',
            //     'username'=>'jacob',
            //     'email'=>'jacob@gmail.com',
            //     'password'=>bcrypt('jacob123'),
            //     'role'=>'mahasiswa',
            // ],
            // [
            //     'name'=>'Kulum Fatmawati',
            //     'username'=>'kulum',
            //     'email'=>'kulum@gmail.com',
            //     'password'=>bcrypt('kulum123'),
            //     'role'=>'mahasiswa',
            // ],
            // [
            //     'name'=>'Khasnah Maesaroh',
            //     'username'=>'khasnah',
            //     'email'=>'khasnah@gmail.com',
            //     'password'=>bcrypt('khasnah123'),
            //     'role'=>'mahasiswa',
            // ],
            // [
            //     'name'=>'Ivana Amanda Putri',
            //     'username'=>'ivana',
            //     'email'=>'ivana@gmail.com',
            //     'password'=>bcrypt('ivana123'),
            //     'role'=>'mahasiswa',
            // ]
        ]);

    }
}
