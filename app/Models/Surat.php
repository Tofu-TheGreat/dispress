<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $table = 'surat';
    protected $primaryKey = 'id_surat';
    protected $fillable = [
        'id_surat',
        'nomor_surat',
        'tanggal_surat',
        'isi_surat',
        'pengirim_surat',
        'id_user',
        'scan_dokumen',
    ];
}
