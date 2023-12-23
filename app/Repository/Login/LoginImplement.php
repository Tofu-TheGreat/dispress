<?php

namespace App\Repository\Login;

use App\Repository\Login\LoginRepository;
use App\Models\User;
use Intervention\Image\Facades\Image;
use App\Models\WebSetting;
use App\Models\Instansi;
use App\Models\PosisiJabatan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginImplement implements LoginRepository
{
    public function getEmail($email)
    {
        return User::where('email', $email)->first();
    }
    public function getUsername($username)
    {
        return User::where('username', $username)->first();
    }
    public function logout($logout)
    {
        Auth::logout();
        $logout->session()->invalidate();
        $logout->session()->regenerateToken();
    }
    public function register($data)
    {
        $jabatan = PosisiJabatan::create([
            'nama_posisi_jabatan' => 'Kepala Instansi',
            'deskripsi_jabatan' => 'Tidak ada deskripsi',
            'tingkat_jabatan' => '0'
        ]);
        $userreg =  User::create([
            'nip' => $data->nip,
            'nama' => $data->nama,
            'level' => 'admin',
            'id_posisi_jabatan' => $jabatan->id_posisi_jabatan,
            // 'foto_user' => $nama_foto,
            'username' => $data->username,
            'email' => $data->email,
            'nomor_telpon' => $data->nomor_telpon,
            'password' => Hash::make($data->password)
        ]);

        Auth::login($userreg);
        $data->session()->regenerate();
    }
    public function register_web_setting($data)
    {
        $instansiCreate = Instansi::create([
            'nama_instansi' => $data->nama_instansi,
            'alamat_instansi' => $data->alamat_instansi,
            'nomor_telpon' => $data->nomor_telpon,
            'email' => $data->email,
        ]);
        $image = $data->default_logo;
        $nama_foto = time() . '.' . $image->extension();
        $destinationPath = public_path('/image_save');
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize(1200, 1200, function ($constraint) {
            $constraint->upsize();
        })->save($destinationPath . '/' . $nama_foto);
        $data->default_logo->move(public_path('image_save'), $nama_foto);
        WebSetting::create([
            'id_instansi' => $instansiCreate['id_instansi'],
            'id_ketua' => $data['id_ketua'],
            'default_logo' => $nama_foto
        ]);
    }
}
