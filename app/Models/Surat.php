<?php

namespace App\Models;

use App\Models\User;
use App\Models\Perusahaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Surat extends Model
{
    use HasFactory;
    protected $table = 'surat';
    protected $primaryKey = 'id_surat';
    protected $fillable = [
        'id_surat',
        'id_klasifikasi',
        'nomor_surat',
        'tanggal_surat',
        'isi_surat',
        'id_instansi',
        'id_user',
        'status_verifikasi',
        'catatan_verifikasi',
        'scan_dokumen',
    ];

    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'id_instansi');
    }

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'id_surat');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function klasifikasi()
    {
        return $this->belongsTo(Klasifikasi::class, 'id_klasifikasi');
    }
}
