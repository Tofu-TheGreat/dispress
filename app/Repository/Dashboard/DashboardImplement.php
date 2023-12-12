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
    public function getTotalAdmin()
    {
        return User::where('level', 'admin')->count();
    }
    public function getTotalOfficer()
    {
        return User::where('level', 'officer')->count();
    }
    public function getTotalStaff()
    {
        return User::where('level', 'staff')->count();
    }
    public function getPengajuanChartData()
    {
        // Assuming you have a 'created_at' timestamp column in your Pengajuan model
        $pengajuanData = Pengajuan::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->get();

        $labels = $pengajuanData->pluck('date')->toArray();
        $data = $pengajuanData->pluck('count')->toArray();

        return [
            'labels' => $labels,
            'data' => $data,
        ];
    }
    public function getDisposisiChartData()
    {
        // Assuming you have a 'created_at' timestamp column in your Disposisi model
        $disposisiData = Disposisi::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->get();

        $labels = $disposisiData->pluck('date')->toArray();
        $data = $disposisiData->pluck('count')->toArray();

        return [
            'labels' => $labels,
            'data' => $data,
        ];
    }
}
