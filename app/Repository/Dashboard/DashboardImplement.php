<?php

namespace App\Repository\Dashboard;

use App\Models\Pengajuan;
use App\Models\User;
use App\Models\Surat;
use App\Models\Disposisi;
use App\Repository\Dashboard\DashboardRepository;
use Illuminate\Support\Facades\Auth;

class DashboardImplement implements DashboardRepository
{
    public function getSuratAdmin()
    {
        return Surat::count();
    }
    public function getPengajuanAdmin()
    {
        return Pengajuan::count();
    }
    public function getDisposisi()
    {
        return Disposisi::where('id_posisi_jabatan', Auth::user()->id_posisi_jabatan)->orWhere('id_penerima', Auth::user()->id_user)->count();
    }
    public function getAllDisposisi()
    {
        return Disposisi::count();
    }
    public function getTotalUser()
    {
        return User::where('level', Auth::user()->level)->count();
    }
}
