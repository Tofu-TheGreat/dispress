<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Repository\Dashboard\DashboardRepository;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    private $dashboardRepository;

    public function __construct(DashboardRepository $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
    }


    public function dashboardAdmin()
    {
        $disposisiCountByUser = $this->dashboardRepository->getDisposisiCountByUser();
        $alldisposisiCount = $this->dashboardRepository->getAllDisposisiCount();

        $suratCount = $this->dashboardRepository->getSuratCount();
        $pengajuanCount = $this->dashboardRepository->getPengajuanCount();

        $suratTugasCount = $this->dashboardRepository->getSuratTugasCount();
        $newestSuratTugas = $this->dashboardRepository->getNewestSuratTugas();

        $adminCount = $this->dashboardRepository->getAdminCount();
        $officerCount = $this->dashboardRepository->getOfficerCount();
        $staffCount = $this->dashboardRepository->getStaffCount();

        $newestPengajuan = $this->dashboardRepository->getNewestPengajuan();
        $newestDisposisi = $this->dashboardRepository->getNewestDisposisi();

        $instansiData = $this->dashboardRepository->getInstansiCount();
        $jabatanData = $this->dashboardRepository->getJabatanCount();

        // Retrieve dynamic data for the chart
        $pengajuanChartData = $this->dashboardRepository->getPengajuanChartData();
        $disposisiChartData = $this->dashboardRepository->getDisposisiChartData();
        $suratTugasChartData = $this->dashboardRepository->getSuratTugasFromUser();
        $pengajuanDisposisiChartData = $this->dashboardRepository->getDisposisiAndPengajuanChartData();

        return view('admin.pages.dashboard-admin', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'active1' => 'dashboard',
            'suratCount' => $suratCount,
            'pengajuanCount' => $pengajuanCount,
            'suratTugasCount' => $suratTugasCount,
            'adminCount' => $adminCount,
            'officerCount' => $officerCount,
            'staffCount' => $staffCount,
            'alldisposisiCount' => $alldisposisiCount,
            'pengajuanChartData' => $pengajuanChartData,
            'disposisiChartData' => $disposisiChartData,
            'pengajuanDisposisiChartData' => $pengajuanDisposisiChartData,
            'newestPengajuan' => $newestPengajuan,
            'newestDisposisi' => $newestDisposisi,
            'newestSuratTugas' => $newestSuratTugas,
            'disposisiCountByUser' => $disposisiCountByUser,
            'instansiData' => $instansiData,
            'jabatanData' => $jabatanData,
            'suratTugasChartData' => $suratTugasChartData,
        ]);
    }
    public function dashboardOfficer()
    {
        $suratChartData = $this->dashboardRepository->getSuratChartData();
        $officerCount = $this->dashboardRepository->getOfficerCount();
        $pengajuanCount = $this->dashboardRepository->getPengajuanCount();
        $getPengajuanByUser = $this->dashboardRepository->getPengajuanByUser();
        $pengajuanUserChart = $this->dashboardRepository->getPengajuanUserChartData();
        $disposisiUserChart = $this->dashboardRepository->getDisposisiFromUser();
        $instansiData = $this->dashboardRepository->getInstansiCount();
        $staffData = $this->dashboardRepository->getStaffCount();
        $suratCount = $this->dashboardRepository->getSuratCount();
        $disposisiCountByUser = $this->dashboardRepository->getDisposisiCountByUser();
        $disposisiByUser = $this->dashboardRepository->getDisposisiByUser();
        $suratTugasChartData = $this->dashboardRepository->getSuratTugasFromUser();

        return view('admin.pages.dashboard-officer', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'active1' => 'dashboard',
            'pengajuanCount' => $pengajuanCount,
            'officerCount' => $officerCount,
            'suratChartData' => $suratChartData,
            'pengajuanUserChart' => $pengajuanUserChart,
            'disposisiUserChart' => $disposisiUserChart,
            'instansiData' => $instansiData,
            'staffData' => $staffData,
            'suratCount' => $suratCount,
            'suratTugasChartData' => $suratTugasChartData,
            'disposisiCountByUser' => $disposisiCountByUser,
            'disposisiByUser' => $disposisiByUser,
            'getPengajuanByUser' => $getPengajuanByUser,
        ]);
    }
    public function dashboardStaff()
    {
        $disposisiUserChart = $this->dashboardRepository->getDisposisiFromUser();
        $staffData = $this->dashboardRepository->getStaffCount();
        $disposisiCountByUser = $this->dashboardRepository->getDisposisiCountByUser();
        $disposisiByUser = $this->dashboardRepository->getDisposisiByUser();
        $suratTugasChartData = $this->dashboardRepository->getSuratTugasFromUser();

        return view('admin.pages.dashboard-staff', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'active1' => 'dashboard',
            'disposisiUserChart' => $disposisiUserChart,
            'staffData' => $staffData,
            'disposisiCountByUser' => $disposisiCountByUser,
            'disposisiByUser' => $disposisiByUser,
            'suratTugasChartData' => $suratTugasChartData,
        ]);
    }
}
