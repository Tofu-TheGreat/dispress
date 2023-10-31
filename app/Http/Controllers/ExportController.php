<?php

namespace App\Http\Controllers;

use App\Exports\AdminExport;
use App\Imports\AdminImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export()
    {
        return Excel::download(new AdminExport, 'admin.xlsx');
    }
    public function import()
    {
        Excel::import(new AdminImport, request()->file('file'));

        return back();
    }
}
