<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelass';
    protected $primaryKey ="id";
    protected $guarded = [''];

    /**
     * Mendefinisikan relasi antara kelas dan dosen sebagai wali kelas.
     */
    public function waliKelas()
    {
        return $this->belongsTo(Dosen::class, 'wali_kelas');
    }
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id_kelas');
    }
    public function dosen()
    {
        return $this->belongsToMany(Dosen::class, 'wali_kelas', 'id_kelas', 'id_dosen');
    }

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'id_kelas');
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'id_kelas');
    }
    public function mapels()
    {
        return $this->hasMany(Mapel::class, 'id_kelas');
    }

}
