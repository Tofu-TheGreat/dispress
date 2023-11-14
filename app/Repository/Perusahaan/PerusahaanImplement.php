<?php

namespace App\Repository\Perusahaan;

use App\Models\Perusahaan;

class PerusahaanImplement implements PerusahaanRepository
{
    private $perusahaan;
    public function __construct(Perusahaan $perusahaan)
    {
        $this->perusahaan = $perusahaan;
    }
}
