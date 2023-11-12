<?php

namespace App\Http\Controllers;

use App\Exports\AdminExport;
use App\Imports\AdminImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export_admin()
    {
        return Excel::download(new AdminExport, 'Data-Admin.xlsx');
    }

    public function export_officer()
    {
        return Excel::download(new AdminExport, 'Data-Admin.xlsx');
    }
}
