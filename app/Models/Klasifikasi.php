<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    use HasFactory;

    protected $table = 'klasifikasi';
    protected $primaryKey = 'id_klasifikasi';
    protected $fillable = [
        'nomor_klasifikasi',
        'nama_klasifikasi',
    ];
}
