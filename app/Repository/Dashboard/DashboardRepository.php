<?php

namespace App\Repository\Dashboard;

interface DashboardRepository
{
    public function getSuratAdmin();
    public function getPengajuanAdmin();
    public function getDisposisi();
    public function getAllDisposisi();
    public function getTotalUser();
}
