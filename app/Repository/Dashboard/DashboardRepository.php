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
}
