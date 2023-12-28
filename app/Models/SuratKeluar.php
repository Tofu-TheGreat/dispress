<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';

    protected $primaryKey = 'id_surat_keluar';

    protected $fillable = [
        'id_klasifikasi',
        'header_surat_keluar',
        'jumlah_lampiran',
        'nomor_surat_keluar',
        'tanggal_surat_keluar',
        'id_user',
        'tujuan_surat_keluar',
        'sifat_surat_keluar',
        'perihal',
        'isi_surat',
        'tembusan',
    ];

    public function klasifikasi()
    {
        return $this->belongsTo(Klasifikasi::class, 'id_klasifikasi');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
