<?php

namespace App\Repository\Dashboard;

interface DashboardRepository
{
    // user
    public function getAdminCount();
    public function getOfficerCount();
    public function getStaffCount();

    //jabatan
    public function getJabatanCount();

    //instansi
    public function getInstansiCount();

    //surat
    public function getSuratCount();

    //pengajuan
    public function getPengajuanCount();
    public function getPengajuanByUser();

    //disposisi
    public function getAllDisposisiCount();
    public function getDisposisiCountByUser();
    public function getDisposisiByUser();

    // terbaru
    public function getNewestPengajuan();
    public function getNewestDisposisi();

    // chart
    public function getPengajuanChartData();
    public function getDisposisiChartData();
    public function getDisposisiAndPengajuanChartData();
    public function getSuratChartData();
    public function getPengajuanUserChartData();
    public function getDisposisiFromUser();
}
