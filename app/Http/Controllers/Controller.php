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
        $disposisiCountByUser = $this->dashboardRepository->getDisposisiByUser();
        $suratCount = $this->dashboardRepository->getSuratAdmin();
        $pengajuanCount = $this->dashboardRepository->getPengajuanAdmin();
        $adminCount = $this->dashboardRepository->getTotalAdmin();
        $officerCount = $this->dashboardRepository->getTotalOfficer();
        $staffCount = $this->dashboardRepository->getTotalStaff();
        $disposisiCount = $this->dashboardRepository->getDisposisi();
        $alldisposisiCount = $this->dashboardRepository->getAllDisposisi();
        $newestPengajuan = $this->dashboardRepository->getNewestPengajuan();
        $newestDisposisi = $this->dashboardRepository->getNewestDisposisi();
        $instansiData = $this->dashboardRepository->getInstansi();
        $jabatanData = $this->dashboardRepository->getJabatan();
        // Retrieve dynamic data for the chart
        $pengajuanChartData = $this->dashboardRepository->getPengajuanChartData();
        $disposisiChartData = $this->dashboardRepository->getDisposisiChartData();
        $pengajuanDisposisiChartData = $this->dashboardRepository->getDisposisiAndPengajuanChartData();

        return view('admin.pages.dashboard-admin', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'active1' => 'dashboard',
            'suratCount' => $suratCount,
            'pengajuanCount' => $pengajuanCount,
            'adminCount' => $adminCount,
            'officerCount' => $officerCount,
            'staffCount' => $staffCount,
            'alldisposisiCount' => $alldisposisiCount,
            'pengajuanChartData' => $pengajuanChartData,
            'disposisiChartData' => $disposisiChartData,
            'pengajuanDisposisiChartData' => $pengajuanDisposisiChartData,
            'newestPengajuan' => $newestPengajuan,
            'newestDisposisi' => $newestDisposisi,
            'disposisiCountByUser' => $disposisiCountByUser,
            'instansiData' => $instansiData,
            'jabatanData' => $jabatanData,
        ]);
    }
    public function dashboardOfficer()
    {
        $suratChartData = $this->dashboardRepository->getSuratChartData();
        $officerCount = $this->dashboardRepository->getTotalOfficer();
        $pengajuanCount = $this->dashboardRepository->getPengajuanAdmin();
        $pengajuanUserChart = $this->dashboardRepository->getPengajuanUserChartData();
        $disposisiUserChart = $this->dashboardRepository->getDisposisiFromUser();
        $instansiData = $this->dashboardRepository->getInstansi();
        $staffData = $this->dashboardRepository->getStaff();
        $suratCount = $this->dashboardRepository->getSuratAdmin();

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
        ]);
    }
    public function dashboardStaff()
    {
        $disposisiUserChart = $this->dashboardRepository->getDisposisiFromUser();
        $staffData = $this->dashboardRepository->getStaff();
        $disposisiCountByUser = $this->dashboardRepository->getDisposisiByUser();

        $staffCount = $this->dashboardRepository->getTotalStaff();
        return view('admin.pages.dashboard-staff', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'active1' => 'dashboard',
            'staffCount' => $staffCount,
            'disposisiUserChart' => $disposisiUserChart,
            'staffData' => $staffData,
            'disposisiCountByUser' => $disposisiCountByUser,
        ]);
    }
}
