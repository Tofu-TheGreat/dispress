<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = 'perusahaan';
    protected $primaryKey = 'id_perusahaan';
    protected $fillable = [
        'nama_perusahaan',
        'alamat_perusahaan',
        'nomor_telepon',
    ];

    public function surat()
    {
        return $this->hasOne(Surat::class, 'id_perusahaan');
    }
}
