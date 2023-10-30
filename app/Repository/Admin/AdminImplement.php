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
        return $this->user->where('level', 'admin')->get();
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
    public function show($id)
    {
        return $this->user->where('id_user', $id)->get();
    }
    public function edit($id)
    {
        return $this->user->where('id_user', $id)->get();
    }
    public function update($id, $data)
    {
        if ($data->hasFile('foto_user')) {
            $user = $this->user->where('id_user', $data->id_user)->first();
            if ($user->foto_user != null) {
                $fotoPath = public_path('image_save/') . $user->foto_user;
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }
            $nama_foto = time() . '.' . $data->foto_user->extension();
            $data->foto_user->move(public_path('image_save'), $nama_foto);
            $this->user->where('id_user', $id)->update([
                'nim' => $data->nim,
                'nama' => $data->nama,
                'level' => $data->level,
                'jabatan' => $data->jabatan,
                'foto_user' => $nama_foto,
                'username' => $data->username,
                'email' => $data->email,
                'nomor_telpon' => $data->nomor_telpon,
                'foto_user' => $nama_foto
            ]);
        } else {
            $this->user->where('id_user', $id)->update([
                'nim' => $data->nim,
                'nama' => $data->nama,
                'level' => $data->level,
                'jabatan' => $data->jabatan,
                'username' => $data->username,
                'email' => $data->email,
                'nomor_telpon' => $data->nomor_telpon,
            ]);
        }
    }
    public function destroy($id)
    {
        $this->user->where('id_user', $id)->delete();
    }
}
