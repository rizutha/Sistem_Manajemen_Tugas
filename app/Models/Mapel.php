<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

interface Describable // Interface
{
    public function getDescription(): string;
}

class BaseMapel extends Model    // Inheritance
{
    use HasFactory;

    protected $table = 'mapels';
    protected $fillable = ['id_kelas', 'dosen_pengajar', 'nama_matkul', 'prodi'];

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

class Mapel extends BaseMapel implements Describable // Polymorphism
{
    // Polymorphism: Overriding sebuah metode
    public function getDescription(): string
    {
        return "Mata kuliah {$this->nama_matkul} untuk program studi {$this->prodi}.";
    }

    // Overloading: Menangani poemanggilan metode dinamis
    public function getDetails(...$attributes)
    {
        if (empty($attributes)) {
            return $this->toArray();
        }

        $details = [];
        foreach ($attributes as $attribute) {
            if (isset($this->{$attribute})) {
                $details[$attribute] = $this->{$attribute};
            }
        }
        return $details;
    }
}
