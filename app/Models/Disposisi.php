<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Disposisi extends Model
{
    use HasFactory;

    protected $table = 'disposisi';
    protected $primaryKey = 'id_disposisi';
    protected $fillable = [
        'id_pengajuan',
        'catatan_disposisi',
        'status_disposisi',
        'sifat_disposisi',
        'id_user',
        'tanggal_disposisi',
        'id_posisi_jabatan',
        'id_penerima',
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id_pengajuan');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function penerima()
    {
        return $this->belongsTo(User::class, 'id_penerima');
    }
    public function posisiJabatan()
    {
        return $this->belongsTo(PosisiJabatan::class, 'id_posisi_jabatan');
    }
}
