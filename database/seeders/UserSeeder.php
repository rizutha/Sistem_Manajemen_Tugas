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
                'name' => 'Ahmad',
                'username' => 'ahmad',
                'email' => 'ahmad@gmail.com',
                'password' => bcrypt('qwe123'),
                'role' => 'mahasiswa',
            ],
            [
                'name' => 'Muhammad',
                'username' => 'muhammad',
                'email' => 'muhammad@gmail.com',
                'password' => bcrypt('qwe123'),
                'role' => 'mahasiswa',
            ],
            [
                'name' => 'Thabit',
                'username' => 'thabit',
                'email' => 'thabit@gmail.com',
                'password' => bcrypt('qwe123'),
                'role' => 'mahasiswa',
            ],
            [
                'name' => 'Zuta',
                'username' => 'zuta',
                'email' => 'zuta@gmail.com',
                'password' => bcrypt('qwe123'),
                'role' => 'mahasiswa',
            ],
            [
                'name' => 'Marzuban',
                'username' => 'marzuban',
                'email' => 'marzuban@gmail.com',
                'password' => bcrypt('qwe123'),
                'role' => 'mahasiswa',
            ],
            [
                'name' => 'Idris',
                'username' => 'idris',
                'email' => 'idris@gmail.com',
                'password' => bcrypt('qwe123'),
                'role' => 'mahasiswa',
            ],
            [
                'name' => 'Alshafii',
                'username' => 'alshafii',
                'email' => 'alshafii@gmail.com',
                'password' => bcrypt('qwe123'),
                'role' => 'mahasiswa',
            ],
            [
                'name' => 'Ikhsan',
                'username' => 'ikhsan',
                'email' => 'ikhsan@gmail.com',
                'password' => bcrypt('qwe123'),
                'role' => 'mahasiswa',
            ],
            [
                'name' => 'Hanif',
                'username' => 'hanif',
                'email' => 'hanif@gmail.com',
                'password' => bcrypt('qwe123'),
                'role' => 'mahasiswa',
            ],
            [
                'name' => 'Adi',
                'username' => 'adi',
                'email' => 'adi@gmail.com',
                'password' => bcrypt('qwe123'),
                'role' => 'mahasiswa',
            ],
            [
                'name' => 'Nursalim',
                'username' => 'nursalim',
                'email' => 'nursalim@gmail.com',
                'password' => bcrypt('qwe123'),
                'role' => 'mahasiswa',
            ],
        ]);
    }
}
