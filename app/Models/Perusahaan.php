<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = 'perusahaan';
    protected $primaryKey = 'id_perusahaan';
    protected $fillable = [
        'nama_perusahaan',
        'alamat_perusahaan',
        'nomor_telpon',
    ];

    public function surat()
    {
        return $this->hasOne(Surat::class, 'id_perusahaan');
    }

    public function getPhoneAttribute()
    {
        $phone = preg_replace("/[^0-9]/", "", $this->phone); //Remove all non-numers
        return substr($phone, 2, 3) . "-" . substr($phone, 6, 3) . "-" . substr($phone, 10, 4);
    }

    //I ALSO SUGGEST CLEANING THE NUMBER WHEN ADDING TO THE DB
    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = preg_replace("/[^0-9]/", "", $value);
    }
}
