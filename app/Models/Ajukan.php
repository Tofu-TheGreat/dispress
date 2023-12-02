<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ajukan extends Model
{
    use HasFactory;
    protected $table = 'ajukan';
    protected $primaryKey = 'id_ajukan';
    protected $fillable = [
        'id_klasifikasi',
        'nomor_agenda',
        'id_surat',
        'tanggal_terima',
        'tujuan_ajuan'
    ];

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'id_surat');
    }
    public function disposisi()
    {
        return $this->hasMany(Disposisi::class, 'id_ajukan');
    }
    public function klasifikasi()
    {
        return $this->belongsTo(Klasifikasi::class, 'id_klasifikasi');
    }
}
