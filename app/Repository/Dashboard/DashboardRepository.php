<?php

namespace App\Repository\Dashboard;

interface DashboardRepository
{
    public function getSuratAdmin();
    public function getPengajuanAdmin();
    public function getDisposisi();
    public function getAllDisposisi();
    public function getTotalAdmin();
    public function getTotalOfficer();
    public function getTotalStaff();
    public function getPengajuanChartData();
    public function getDisposisiChartData();
    public function getDisposisiAndPengajuanChartData();
    public function getNewestPengajuan();
    public function getSuratChartData();
    public function getPengajuanUserChartData();
    public function getDisposisiFromUser();
    public function getInstansi();
    public function getStaff();
    public function getDisposisiByUser();
}
