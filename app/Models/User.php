<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Surat;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'nip',
        'nama',
        'level',
        'jabatan',
        'foto_user',
        'username',
        'nomor_telpon',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

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

    public function surat()
    {
        return $this->hasMany(Surat::class, 'id_user');
    }
}
