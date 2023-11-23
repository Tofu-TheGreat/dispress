<?php

namespace App\Http\Controllers;

use App\Exports\AdminExport;
use App\Exports\OfficerExport;
use App\Exports\PerusahaanExport;
use App\Exports\StaffExport;
use App\Exports\SuratExport;
use App\Imports\AdminImport;
use Illuminate\Http\Request;
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
    public function export_perusahaan()
    {
        return Excel::download(new PerusahaanExport, 'Data-Perusahaan.xlsx');
    }
    public function getPerusahaanNames()
    {
        $perusahaanNames = Perusahaan::pluck('nama_perusahaan')->toArray();

        return response()->json($perusahaanNames);
    }
}
