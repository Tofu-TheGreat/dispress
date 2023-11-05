<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\AdminImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function import_admin()
    {
        if (request()->has('file')) {
            $import = new AdminImport();
            Excel::import($import, request()->file('file'));

            return back()->with('import_success', 'Berhasil Import data Admin');
        } else {
            return back()->with('failed', 'Tolong masukan file');
        }
    }
}
