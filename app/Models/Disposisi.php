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
        'tujuan_disposisi',
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
}
