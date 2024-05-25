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
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Husni Faqih',
                'username' => 'hnf',
                'email' => 'hnf@gmail.com',
                'password' => bcrypt('hnf12345'),
                'role' => 'dosen',
            ],
            [
                'name' => 'Husni Mubarok',
                'username' => 'hub',
                'email' => 'hub@gmail.com',
                'password' => bcrypt('hub12345'),
                'role' => 'dosen',
            ],
            [
                'name' => 'Sopian Aji',
                'username' => 'sop',
                'email' => 'sop@gmail.com',
                'password' => bcrypt('sop12345'),
                'role' => 'dosen',
            ],
            [
                'name' => 'Fanny Fatma Wati',
                'username' => 'ffw',
                'email' => 'ffw@gmail.com',
                'password' => bcrypt('ffw12345'),
                'role' => 'dosen',
            ],
            [
                'name' => 'ahmad',
                'username' => 'ahmad',
                'email' => 'ahmad@gmail.com',
                'password' => bcrypt('qwe123'),
                'role' => 'mahasiswa',
            ],
            [
                'name' => 'muhammad',
                'username' => 'muhammad',
                'email' => 'muhammad@gmail.com',
                'password' => bcrypt('qwe123'),
                'role' => 'mahasiswa',
            ],
            [
                'name' => 'thabit',
                'username' => 'thabit',
                'email' => 'thabit@gmail.com',
                'password' => bcrypt('qwe123'),
                'role' => 'mahasiswa',
            ],
            [
                'name' => 'zuta',
                'username' => 'zuta',
                'email' => 'zuta@gmail.com',
                'password' => bcrypt('qwe123'),
                'role' => 'mahasiswa',
            ],
            [
                'name' => 'marzuban',
                'username' => 'marzuban',
                'email' => 'marzuban@gmail.com',
                'password' => bcrypt('qwe123'),
                'role' => 'mahasiswa',
            ],
            [
                'name' => 'idris',
                'username' => 'idris',
                'email' => 'idris@gmail.com',
                'password' => bcrypt('qwe123'),
                'role' => 'mahasiswa',
            ],
            [
                'name' => 'alshafii',
                'username' => 'alshafii',
                'email' => 'alshafii@gmail.com',
                'password' => bcrypt('qwe123'),
                'role' => 'mahasiswa',
            ],
            [
                'name' => 'ikhsan',
                'username' => 'ikhsan',
                'email' => 'ikhsan@gmail.com',
                'password' => bcrypt('qwe123'),
                'role' => 'mahasiswa',
            ],
            [
                'name' => 'hanif',
                'username' => 'hanif',
                'email' => 'hanif@gmail.com',
                'password' => bcrypt('qwe123'),
                'role' => 'mahasiswa',
            ],
            [
                'name' => 'adi',
                'username' => 'adi',
                'email' => 'adi@gmail.com',
                'password' => bcrypt('qwe123'),
                'role' => 'mahasiswa',
            ],
            [
                'name' => 'nursalim',
                'username' => 'nursalim',
                'email' => 'nursalim@gmail.com',
                'password' => bcrypt('qwe123'),
                'role' => 'mahasiswa',
            ],
        ]);
    }
}
