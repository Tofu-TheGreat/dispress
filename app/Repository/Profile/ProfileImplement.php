<?php

namespace App\Repository\Profile;

use App\Models\Disposisi;
use App\Models\Pengajuan;
use App\Models\Surat;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Intervention\Image\Facades\Image;
use App\Models\PosisiJabatan;
use Illuminate\Support\Facades\Auth;

class ProfileImplement implements ProfileRepository
{
    public function userGet()
    {
        $usersList = User::where('id_user', auth()->user()->id_user)->first();
        return $usersList;
    }
    public function posisiJabatanGet()
    {
        $posisiJabatanList = PosisiJabatan::get();
        return $posisiJabatanList;
    }
    public function getSuratByUser()
    {
        return Surat::where('id_user', Auth::user()->id_user)->count();
    }
    public function getPengajuanByUser()
    {
        return Pengajuan::where('id_user', Auth::user()->id_user)->count();
    }
    public function getDisposisiByUser()
    {
        return Disposisi::where('id_user', Auth::user()->id_user)->count();
    }
    public function getDisposisiForUser()
    {
        return Disposisi::where('id_posisi_jabatan', Auth::user()->id_posisi_jabatan)->orWhere('id_penerima', Auth::user()->id_user)->count();
    }
    public function getSuratKeluarForUser()
    {
        //
    }
    public function editProfile($data, $id)
    {
        if ($data->hasFile('foto_user')) {
            $user = User::where('id_user', $data->id_user)->first();
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
            User::where('id_user', $id)->update([
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
            User::where('id_user', $id)->update([
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
    public function changePassword($data, $id)
    {
        User::where('id_user', $id)->update([
            'password' => Hash::make($data->password_baru)
        ]);
    }
    public function getDisposisiFromUserChart()
    {
        $allMonths = [
            "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
        ];

        $disposisiData = Disposisi::selectRaw('DATE_FORMAT(tanggal_disposisi, "%M") as date, COUNT(*) as count')
            ->where('id_penerima', auth()->user()->id_user)
            ->orWhere('id_posisi_jabatan', auth()->user()->id_posisi_jabatan)
            ->groupBy('date')
            ->get();

        $disposisiCounts = [];

        foreach ($allMonths as $month) {
            $disposisiCounts[$month] = $disposisiData->where('date', $month)->first()->count ?? 0;
        }

        return [
            'dates' => $allMonths,
            'disposisi_count' => array_values($disposisiCounts),
        ];
    }
}
