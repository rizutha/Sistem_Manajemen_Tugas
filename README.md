<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Tentang Sistem Manajemen Tugas 

Sistem Manajemen Tugas adalah aplikasi berbasis web untuk mengelola data tugas dalam proses pembelajaran. Dengan aplikasi ini, pengguna dapat dengan mudah mengelola data terkait kelas, jurusan, mata pelajaran, guru/dosen, murid/mahasiswa, dan tugas secara praktis dalam satu tempat.

Aplikasi ini menggunakan template dari <a href="https://github.com/zuramai/mazer">Mazer - by Zuramai</a>, yang menghadirkan dashboard dengan desain UI Kit yang konsisten, rapi, dan mudah digunakan.

## Memulai Proses Instalasi

1. Clone repository Sistem Manajemen Tugas ini ke penyimpanan lokal.
git clone https://github.com/rizutha/Sistem_Manajemen_Tugas.git

2. Masuk ke direktori proyek.
cd Sistem_Manajemen_Tugas

3. Install Composer
composer Install 

4. Salin file .env.example lalu ubah nama salinannya menjadi .env dan isi dengan konfigurasi berikut

APP_NAME="Sistem Manajemen Tugas"
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE="nama_database"
DB_USERNAME=root
DB_PASSWORD=your_password


5. Generate Key Aplikasi Jalankan perintah berikut untuk menghasilkan kunci aplikasi:
php artisan key:generate

6. Lakukan migrasi tabel database dengan:
php artisan migrate

7. Apabila ingin menambahkan data awal gunakan:
php artisan db:seed

8. Untuk menjalankan proyek secara lokal, pastikan software web server lokal telah berjalan, lalu jalankan server lokal dengan:
php artisan serve

## Panduan Penggunaan

- Login sebagai admin menggunakan kredensial default (jika disediakan dalam seeder).
- Navigasikan ke dashboard untuk mulai mengelola data.
- Manfaatkan fitur seperti tambah, edit, hapus, dan pelacakan tugas sesuai kebutuhan.

## Bug

- Versi ini masih memiliki bug apabila Laravel Notifier digunakan pada suatu halaman, maka bootstrap pada halaman tersebut akan konflik dengan @notifyCss dari Laravel Notifier sehingga beberapa classnya menghasilkan output sesuai yang diharapkan.

## Teknologi & Library

Tech Stack
- Laravel Framework 10.48.14
- HTML
- CSS
- Bootstrap CSS

Library
- Laravel Fortify
- Laravel Notifier

Template Frontend
<a href="https://github.com/zuramai/mazer">Mazer - by Zuramai</a>
