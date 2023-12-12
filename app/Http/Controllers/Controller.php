<?php

namespace App\Http\Controllers;

use App\Repository\Dashboard\DashboardRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

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
        $suratCount = $this->dashboardRepository->getSuratAdmin();
        $pengajuanCount = $this->dashboardRepository->getPengajuanAdmin();
        $adminCount = $this->dashboardRepository->getTotalAdmin();
        $officerCount = $this->dashboardRepository->getTotalOfficer();
        $staffCount = $this->dashboardRepository->getTotalStaff();
        $disposisiCount = $this->dashboardRepository->getDisposisi();
        $alldisposisiCount = $this->dashboardRepository->getAllDisposisi();

        // Retrieve dynamic data for the chart
        $pengajuanChartData = $this->dashboardRepository->getPengajuanChartData();
        $disposisiChartData = $this->dashboardRepository->getDisposisiChartData();

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
        ]);
    }
    public function dashboardOfficer()
    {
        $officerCount = $this->dashboardRepository->getTotalOfficer();
        return view('admin.pages.dashboard-officer', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'active1' => 'dashboard',
            'officerCount' => $officerCount,
        ]);
    }
    public function dashboardStaff()
    {
        $staffCount = $this->dashboardRepository->getTotalStaff();
        return view('admin.pages.dashboard-staff', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'active1' => 'dashboard',
            'staffCount' => $staffCount,
        ]);
    }
}
