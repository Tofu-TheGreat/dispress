<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboardAdmin()
    {
        return view('admin.pages.dashboard-admin', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'active1' => 'dashboard',
        ]);
    }
    public function dashboardOfficer()
    {
        return view('admin.pages.dashboard-officer', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'active1' => 'dashboard',
        ]);
    }
    public function dashboardStaff()
    {
        return view('admin.pages.dashboard-staff', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'active1' => 'dashboard',
        ]);
    }
}
