<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapels';
    protected $fillable = ['id_kelas', 'dosen_pengajar', 'nama_matkul'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_pengajar');
    }
    public function dosens()
    {
        return $this->belongsToMany(Dosen::class, 'dosen_pengajar', 'mapel_id', 'dosen_id');
    }
}
