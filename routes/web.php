<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\PengumpulanController;
use App\Http\Controllers\TugasController;
use App\Models\Tugas;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
});
Route::get('/masuk', function () {
    return view('login');
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'auth']);
Route::get('/change-password', [AuthController::class, 'changePassword'])->middleware('auth')->name('change.password');
Route::post('/update-password', [AuthController::class, 'updatePassword'])->middleware('auth')->name('update.password');

Route::get('/beranda', function () {
    return view('dashboard');
});

// Route::get('/get-kelas-by-mapel/{id}', [TugasController::class, 'getKelasByMapel']);

Route::group(['middleware' => 'checkRole:admin'], function () {

    Route::get('/akun', [AuthController::class, 'index']);
    Route::get('/akun/create', [AuthController::class, 'create']);
    Route::get('/akun/detail/{id}', [AuthController::class, 'detail']);
    Route::get('/akun/edit/{id}', [AuthController::class, 'edit']);
    Route::post('/akun/store', [AuthController::class, 'store']);
    Route::post('/akun/update/{id}', [AuthController::class, 'akunUpdate']);
    Route::get('/akun/{id}', [AuthController::class, 'show'])->name('mahasiswa.show');
    Route::post('/akun/{id}', [AuthController::class, 'update']);
    Route::delete('/akun/destroy/{id}', [AuthController::class, 'destroy']);

    Route::resource('kelas', KelasController::class);
    Route::resource('mapel', MapelController::class);

    Route::resource('mahasiswa', MahasiswaController::class);

    Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.detail');


    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
    Route::post('/dosen', [DosenController::class, 'store'])->name('dosen.store');
    Route::get('/dosen/{id}/edit', [DosenController::class, 'edit'])->name('dosen.edit');
    Route::put('/dosen/{id}', [DosenController::class, 'update'])->name('dosen.update');
    Route::get('/dosen/{id}', [DosenController::class, 'show'])->name('dosen.show');
    Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');
});
Route::group(['middleware' => 'checkRole:dosen'], function () {

    Route::get('/tugaskelas', [TugasController::class, 'index'])->name('tugas.index');
    Route::get('/tugas/create', [TugasController::class, 'create'])->name('tugas.create');
    Route::post('/tugas', [TugasController::class, 'store'])->name('tugas.store');
    Route::get('/tugas/{id}/edit', [TugasController::class, 'edit'])->name('tugas.edit');
    Route::post('/tugas/{id}/update', [TugasController::class, 'update']);
    Route::delete('/tugas/{id}', [TugasController::class, 'destroy'])->name('tugas.destroy');
    Route::get('/profildsn', [DosenController::class, 'showProfil'])->name('profildsn');
    Route::get('datakelas', [DosenController::class, 'showMahasiswa'])->name('datakelas');
    Route::get('/detailmhs/{id}', [DosenController::class, 'detail'])->name('detailmhs');
    Route::get('/tugas/pengumpulans', [PengumpulanController::class, 'indexdosen'])->name('pengumpulan.indexdosen');
    Route::get('/tugas/{id}/pengumpulanedit', [PengumpulanController::class, 'edit'])->name('pengumpulan.edit');
    Route::put('/tugas/pengumpulans/{id}', [PengumpulanController::class, 'update'])->name('pengumpulan.update');
    Route::get('/dashboard', [DosenController::class, 'dashboard'])->name('dashboard');
    Route::resource('tugas', TugasController::class);
    Route::get('/pengumpulan/{id}/edit', [PengumpulanController::class, 'edit'])->name('pengumpulan.edit');
    Route::patch('/pengumpulan/{id}/dosen-update', [PengumpulanController::class, 'dosenUpdate'])->name('pengumpulan.dosenUpdate');
    Route::get('/pengumpulan/tugas/{tugasId}', [PengumpulanController::class, 'index'])->name('pengumpulan.index');
    Route::get('/tugas/{tugasId}/pengumpulans', [TugasController::class, 'indexdosen'])->name('tugas.pengumpulans');
    Route::get('/get-kelas/{id}', [TugasController::class, 'getKelas']);
});

Route::group(['middleware' => 'checkRole:mahasiswa'], function () {
    Route::get('/datatugas', [PengumpulanController::class, 'index'])->name('pengumpulan.index');
    Route::get('/pengumpulan/create', [PengumpulanController::class, 'create'])->name('pengumpulan.create');
    Route::post('/pengumpulan/store', [PengumpulanController::class, 'store'])->name('pengumpulan.store');
    Route::get('/pengumpulan/{id}/edit', [PengumpulanController::class, 'edit'])->name('pengumpulan.edit');
    Route::put('/pengumpulan/{id}/update', [PengumpulanController::class, 'update'])->name('pengumpulan.update');
    Route::get('/profilmhs', [MahasiswaController::class, 'showProfil'])->name('profilmhs');
    Route::patch('/pengumpulan/{id}', [PengumpulanController::class, 'update'])->name('pengumpulan.update');
    Route::put('/pengumpulan/{id}', [PengumpulanController::class, 'update']); // Tambahkan ini jika ingin mendukung PUT

});

// ResetPassword Routes

// Route::get('password/reset', function () {
//     return view('auth.passwords.email');
// })->name('password.request');

// Route::post('password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

// Route::get('password/reset/{token}', function ($token) {
//     return view('auth.passwords.reset', ['token' => $token]);
// })->name('password.reset');

// Route::post('password/reset', [AuthController::class, 'resetPassword'])->name('password.update');


Route::get('/logout', [AuthController::class, 'logout']);
