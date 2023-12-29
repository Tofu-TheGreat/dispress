<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratTugas extends Model
{
    use HasFactory;

    protected $table = 'surat_tugas'; // Sesuaikan dengan nama tabel yang sesuai

    protected $primaryKey = 'id_surat_tugas'; // Sesuaikan dengan primary key yang sesuai

    protected $fillable = [
        'id_klasifikasi',
        'id_user',
        'id_user_penerima',
        'nomor_surat_tugas',
        'lokasi_surat_tugas',
        'tanggal_surat_tugas',
        'tanggal_mulai',
        'tanggal_selesai',
        'waktu_mulai',
        'waktu_selesai',
        'dasar_surat_tugas',
        'tujuan_tugas',
        'tempat_tugas',
    ];

    protected $casts = [
        'id_user_penerima' => 'array', // Kolom id_user_penerima disimpan sebagai array
    ];

    // Relasi dengan tabel klasifikasi
    public function klasifikasi()
    {
        return $this->belongsTo(Klasifikasi::class, 'id_klasifikasi');
    }

    // Relasi dengan tabel users untuk pengirim
    public function pengirim()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
