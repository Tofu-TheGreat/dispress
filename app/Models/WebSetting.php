<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebSetting extends Model
{
    use HasFactory;

    protected $table = 'web_setting';

    protected $primaryKey = 'id_web_setting';

    protected $fillable = [
        'id_instansi',
        'id_ketua',
        'default_logo',

    ];

    protected $casts = [];


    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'id_instansi', 'id_instansi');
    }

    public function ketua()
    {
        return $this->belongsTo(User::class, 'id_ketua', 'id_user');
    }
}
