<?php

namespace App\Repository\Staff;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class StaffImplement implements StaffRepository
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function getUserByStaff()
    {
        return $this->user->where('level', 'staff')->get();
    }
    public function store($data)
    {
        if ($data->hasFile('foto_user')) {
            $image = $data->foto_user;
            $nama_foto = time() . '.' . $image->extension();
            $destinationPath = public_path('/image_save');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(1200, 1200, function ($constraint) {
                $constraint->upsize();
            })->save($destinationPath . '/' . $nama_foto);
            $data->foto_user->move(public_path('image_save'), $nama_foto);
            $this->user->create([
                'nip' => $data->nip,
                'nama' => $data->nama,
                'level' => $data->level,
                'pangkat' => $data->pangkat,
                'golongan' => $data->golongan,
                'jenis_kelamin' => $data->jenis_kelamin,
                'id_posisi_jabatan' => $data->id_posisi_jabatan,
                'foto_user' => $nama_foto,
                'username' => $data->username,
                'email' => $data->email,
                'nomor_telpon' => $data->nomor_telpon,
                'password' => Hash::make($data->password)
            ]);
        } else {
            $this->user->create([
                'nip' => $data->nip,
                'nama' => $data->nama,
                'level' => $data->level,
                'pangkat' => $data->pangkat,
                'golongan' => $data->golongan,
                'jenis_kelamin' => $data->jenis_kelamin,
                'id_posisi_jabatan' => $data->id_posisi_jabatan,
                'username' => $data->username,
                'email' => $data->email,
                'nomor_telpon' => $data->nomor_telpon,
                'password' => Hash::make($data->password)
            ]);
        }
    }
    public function show($id)
    {
        $data =  $this->user->where('id_user', $id)->first();
        return $data;
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
            $image = $data->foto_user;
            $nama_foto = time() . '.' . $image->extension();
            $destinationPath = public_path('/image_save');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->fit(1200, 1200, function ($constraint) {
                $constraint->upsize();
            })->save($destinationPath . '/' . $nama_foto);
            $this->user->where('id_user', $id)->update([
                'nip' => $data->nip,
                'nama' => $data->nama,
                'level' => $data->level,
                'pangkat' => $data->pangkat,
                'golongan' => $data->golongan,
                'jenis_kelamin' => $data->jenis_kelamin,
                'id_posisi_jabatan' => $data->id_posisi_jabatan,
                'foto_user' => $nama_foto,
                'username' => $data->username,
                'email' => $data->email,
                'nomor_telpon' => $data->nomor_telpon,
                'foto_user' => $nama_foto
            ]);
        } else {
            $this->user->where('id_user', $id)->update([
                'nip' => $data->nip,
                'nama' => $data->nama,
                'level' => $data->level,
                'pangkat' => $data->pangkat,
                'golongan' => $data->golongan,
                'jenis_kelamin' => $data->jenis_kelamin,
                'id_posisi_jabatan' => $data->id_posisi_jabatan,
                'username' => $data->username,
                'email' => $data->email,
                'nomor_telpon' => $data->nomor_telpon,
            ]);
        }
    }
    public function destroy($id)
    {
        $user = $this->user->find($id);
        if ($user->foto_user != null) {
            $fotoPath = public_path('image_save/') . $user->foto_user;
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }
        $user->where('id_user', $id)->delete();
    }

    public function deleteImageFromUser($id)
    {
        $user = $this->user->find($id);
        if ($user->foto_user != null) {
            $fotoPath = public_path('image_save/') . $user->foto_user;
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }
        $user->foto_user = null;
        $user->save();
    }
}
