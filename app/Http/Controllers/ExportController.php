<?php

namespace App\Http\Controllers;

use App\Exports\AdminExport;
use App\Exports\OfficerExport;
use App\Exports\InstansiExport;
use App\Exports\KlasifikasiExport;
use App\Exports\StaffExport;
use App\Exports\SuratExport;
use App\Imports\AdminImport;
use App\Models\Perusahaan;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export_admin()
    {
        return Excel::download(new AdminExport, 'Data-Admin.xlsx');
    }

    public function export_officer()
    {
        return Excel::download(new OfficerExport, 'Data-Officer.xlsx');
    }
    public function export_staff()
    {
        return Excel::download(new StaffExport, 'Data-Staff.xlsx');
    }
    public function export_surat()
    {
        return Excel::download(new SuratExport, 'Data-Surat.xlsx');
    }
    public function export_Instansi()
    {
        return Excel::download(new InstansiExport, 'Data-Instansi.xlsx');
    }
    public function export_nomorklasifikasi()
    {
        return Excel::download(new KlasifikasiExport, 'Data-Nomor-Klasifikasi.xlsx');
    }
    // public function getPerusahaanNames()
    // {
    //     $perusahaanNames = ::pluck('nama_perusahaan')->toArray();

    //     return response()->json($perusahaanNames);
    // }
}
