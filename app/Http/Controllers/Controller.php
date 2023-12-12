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
        $adminCount = $this->dashboardRepository->getTotalUser();
        $disposisiCount = $this->dashboardRepository->getDisposisi();
        $alldisposisiCount = $this->dashboardRepository->getAllDisposisi();
        return view('admin.pages.dashboard-admin', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'active1' => 'dashboard',
            'suratCount' => $suratCount,
            'pengajuanCount' => $pengajuanCount,
            'adminCount' => $adminCount,
            'alldisposisiCount' => $alldisposisiCount,
        ]);
    }
    public function dashboardOfficer()
    {
        $officerCount = $this->dashboardRepository->getTotalUser();
        return view('admin.pages.dashboard-officer', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'active1' => 'dashboard',
            'officerCount' => $officerCount,
        ]);
    }
    public function dashboardStaff()
    {
        $staffCount = $this->dashboardRepository->getTotalUser();
        return view('admin.pages.dashboard-staff', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'active1' => 'dashboard',
            'staffCount' => $staffCount,
        ]);
    }
}
