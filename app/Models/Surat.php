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
        'nomor_surat',
        'tanggal_surat',
        'isi_surat',
        'id_perusahaan',
        'id_user',
        'scan_dokumen',
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function disposisi()
    {
        return $this->hasOne(Disposisi::class, 'id_surat');
    }
}
