<?php

namespace App\Repository\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminImplement implements AdminRepository
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function getUserByAdmin()
    {
        return $this->user->where('level', 'admin')->paginate(6);
    }
    public function store($data)
    {
        if ($data->hasFile('foto_user')) {
            $nama_foto = time() . '.' . $data->foto_user->extension();
            $data->foto_user->move(public_path('image_save'), $nama_foto);
            $this->user->create([
                'nim' => $data->nim,
                'nama' => $data->nama,
                'level' => $data->level,
                'jabatan' => $data->jabatan,
                'foto_user' => $nama_foto,
                'username' => $data->username,
                'email' => $data->email,
                'nomor_telpon' => $data->nomor_telpon,
                'password' => Hash::make($data->password)
            ]);
        } else {
            $this->user->create([
                'nim' => $data->nim,
                'nama' => $data->nama,
                'level' => $data->level,
                'jabatan' => $data->jabatan,
                'username' => $data->username,
                'email' => $data->email,
                'nomor_telpon' => $data->nomor_telpon,
                'password' => Hash::make($data->password)
            ]);
        }
    }
}
