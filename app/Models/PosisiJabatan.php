<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosisiJabatan extends Model
{
    use HasFactory;

    protected $table = 'posisi_jabatan';
    protected $primaryKey = 'id_posisi_jabatan';
    protected $fillable = [
        'nama_posisi_jabatan',
        'deskripsi_jabatan',
        'tingkat_jabatan',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id_posisi_jabatan');
    }
    public function pengajuan()
    {
        return $this->hasOne(Pengajuan::class, 'id_posisi_jabatan');
    }
    public function disposisi()
    {
        return $this->hasOne(Disposisi::class, 'id_posisi_jabatan');
    }
}
