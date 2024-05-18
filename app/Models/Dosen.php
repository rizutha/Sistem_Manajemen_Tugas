<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosens';
    protected $guarded = [''];
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'wali_kelas', 'id_dosen', 'id_kelas', 'id');
    }
    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'id_dosens');
    }
    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class);
    }
    public function pengumpulan()
    {
        return $this->hasManyThrough(Pengumpulan::class, Tugas::class, 'id_dosens', 'id_tugas');
    }
    public function mapels()
    {
        return $this->belongsToMany(Mapel::class, 'dosen_pengajar', 'dosen_id', 'mapel_id');
    }

    public function tugass()
    {
        return $this->hasMany(Tugas::class, 'id_dosens');
    }

}
