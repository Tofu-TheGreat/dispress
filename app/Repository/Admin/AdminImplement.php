<?php

namespace App\Repository\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

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
                'jabatan' => $data->jabatan,
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
        $data =  $this->user->where('id_user', $id)->first();

        switch ($data->jabatan) {
            case 0:
                $data->jabatan = 'Kepala Sekolah';
                break;
            case 1:
                $data->jabatan = 'Wakil Kepala Sekolah';
                break;
            case 2:
                $data->jabatan = 'Kurikulum';
                break;
            case 3:
                $data->jabatan = 'Kesiswaan';
                break;
            case 4:
                $data->jabatan = 'Sarana dan Prasarana';
                break;
            case 5:
                $data->jabatan = 'Kepala Jurusan';
                break;
            case 6:
                $data->jabatan = 'Hubin';
                break;
            case 7:
                $data->jabatan = 'Bimbingan Konseling';
                break;
            case 8:
                $data->jabatan = 'Guru Umum';
                break;
            case 9:
                $data->jabatan = 'Tata Usaha';
                break;
            default:
                $data->jabatan = 'Tidak Diketahui';
        }
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
                'jabatan' => $data->jabatan,
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
