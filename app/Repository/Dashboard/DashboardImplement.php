<?php

namespace App\Repository\Dashboard;

use App\Models\Pengajuan;
use App\Models\User;
use App\Models\Surat;
use App\Models\Disposisi;
use App\Models\Instansi;
use App\Models\PosisiJabatan;
use App\Models\SuratTugas;
use App\Repository\Dashboard\DashboardRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class DashboardImplement implements DashboardRepository
{
    // get user
    public function getAdminCount()
    {
        return User::where('level', 'admin')->count();
    }
    public function getOfficerCount()
    {
        return User::where('level', 'officer')->count();
    }
    public function getStaffCount()
    {
        return User::where('level', 'staff')->count();
    }
    // End get user

    // Get jabatan
    public function getJabatanCount()
    {
        return PosisiJabatan::count();
    }
    // end get jabatan

    // Get instansi
    public function getInstansiCount()
    {
        return Instansi::count();
    }
    // end get instansi

    // Get surat
    public function getSuratCount()
    {
        return Surat::count();
    }
    // end get surat

    // Get pengajuan
    public function getPengajuanCount()
    {
        return Pengajuan::count();
    }
    public function getPengajuanByUser()
    {
        return Pengajuan::where('id_user',  Auth::user()->id_user)->count();
    }
    // end get pengajuan

    // Get disposisi

    public function getAllDisposisiCount()
    {
        return Disposisi::count();
    }

    public function getDisposisiCountByUser()
    {
        return Disposisi::where('id_posisi_jabatan', Auth::user()->id_posisi_jabatan)->orWhere('id_penerima', Auth::user()->id_user)->count();
    }

    public function getDisposisiByUser()
    {
        return Disposisi::where('id_posisi_jabatan', Auth::user()->id_posisi_jabatan)
            ->orWhere('id_penerima', Auth::user()->id_user)
            ->get();
    }
    // End get disposisi

    // get surat tugas
    public function getSuratTugasCount()
    {
        return SuratTugas::count();
    }

    // Get Newest data

    public function getNewestPengajuan()
    {
        $collections = Pengajuan::get();

        return $collections->sortByDesc('created_at');
    }
    public function getNewestDisposisi()
    {
        $collections = Disposisi::get();

        return $collections->sortByDesc('created_at');
    }

    public function getNewestSuratTugas()
    {
        $collections = SuratTugas::get();

        return $collections->sortByDesc('created_at');
    }

    // End Get newest data

    // Get data chart

    public function getPengajuanChartData()
    {
        // Assuming you have a 'created_at' timestamp column in your Pengajuan model
        $pengajuanData = Pengajuan::selectRaw('DATE(tanggal_terima) as date, COUNT(*) as count')
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
        $disposisiData = Disposisi::selectRaw('DATE(tanggal_disposisi) as date, COUNT(*) as count')
            ->groupBy('date')
            ->get();

        $labels = $disposisiData->pluck('date')->toArray();
        $data = $disposisiData->pluck('count')->toArray();

        return [
            'labels' => $labels,
            'data' => $data,
        ];
    }
    public function getDisposisiAndPengajuanChartData()
    {
        $allMonths = [
            "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
        ];

        $disposisiData = Disposisi::selectRaw('DATE_FORMAT(created_at, "%M") as date, COUNT(*) as count')
            ->where('id_user', auth()->user()->id_user)
            ->groupBy('date')
            ->get();

        $pengajuanData = Pengajuan::selectRaw('DATE_FORMAT(created_at, "%M") as date, COUNT(*) as count')
            ->where('id_user', auth()->user()->id_user)
            ->groupBy('date')
            ->get();

        // Fill in zeros for months without data
        $disposisiCounts = [];
        $pengajuanCounts = [];

        foreach ($allMonths as $month) {
            $disposisiCounts[$month] = $disposisiData->where('date', $month)->first()->count ?? 0;
            $pengajuanCounts[$month] = $pengajuanData->where('date', $month)->first()->count ?? 0;
        }

        return [
            'dates' => $allMonths,
            'disposisi_count' => array_values($disposisiCounts),
            'pengajuan_count' => array_values($pengajuanCounts),
        ];
    }

    public function getSuratChartData()
    {
        // Assuming you have a 'created_at' timestamp column in your Surat model
        $suratData = Surat::selectRaw('DATE(tanggal_surat) as date, COUNT(*) as count')
            ->groupBy('date')
            ->get();

        $labels = $suratData->pluck('date')->toArray();
        $data = $suratData->pluck('count')->toArray();

        return [
            'labels' => $labels,
            'data' => $data,
        ];
    }
    public function getPengajuanUserChartData()
    {
        // Assuming you have a 'created_at' timestamp column in your Pengajuan model
        $pengajuanData = Pengajuan::selectRaw('DATE(tanggal_terima) as date, COUNT(*) as count')
            ->where('id_user', auth()->user()->id_user)
            ->groupBy('date')
            ->get();

        $labels = $pengajuanData->pluck('date')->toArray();
        $data = $pengajuanData->pluck('count')->toArray();

        return [
            'labels' => $labels,
            'data' => $data,
        ];
    }
    public function getDisposisiFromUser()
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

    public function getSuratTugasFromUser()
    {
        $allMonths = [
            "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
        ];

        $userId = Auth::user()->id_user;
        $suratTugasData = SuratTugas::selectRaw('DATE_FORMAT(created_at, "%M") as month, JSON_UNQUOTE(JSON_EXTRACT(id_user_penerima, "$[0]")) as user, COUNT(*) as count')
            ->whereRaw("JSON_CONTAINS(JSON_UNQUOTE(JSON_EXTRACT(id_user_penerima, '$[0]')), ?)", ['"' . $userId . '"'])
            ->groupBy('month', 'user')
            ->get();


        $suratTugasCounts = [];

        foreach ($allMonths as $month) {
            $suratTugasCounts[$month] = $suratTugasData->where('month', $month)->sum('count');
        }

        return [
            'dates' => $allMonths,
            'suratTugas_count' => array_values($suratTugasCounts),
        ];
    }


    // end get chart data


}
