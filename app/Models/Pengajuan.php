<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = 'pengajuan';
    protected $primaryKey = 'id_pengajuan';
    protected $fillable = [
        'id_klasifikasi',
        'nomor_agenda',
        'id_surat',
        'tanggal_terima',
        'status_pengajuan',
        'catatan_pengajuan',
        'id_user',
        'tujuan_pengajuan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function surat()
    {
        return $this->belongsTo(Surat::class, 'id_surat');
    }
    public function disposisi()
    {
        return $this->hasMany(Disposisi::class, 'id_pengajuan');
    }
    public function klasifikasi()
    {
        return $this->belongsTo(Klasifikasi::class, 'id_klasifikasi');
    }
}
