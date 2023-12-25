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
        'nomor_surat_keluar',
        'tanggal_surat_keluar',
        'id_user',
        'id_instansi_penerima',
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


    public function instansiPenerima()
    {
        return $this->belongsTo(Instansi::class, 'id_instansi_penerima');
    }
}
