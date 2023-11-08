<?php

namespace App\Http\Controllers;

use App\Imports\AdminImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class ImportController extends Controller
{
    public function import_admin(Request $request)
    {
        if (request()->has('file')) {
            $request->validate([
                'file' => 'mimes:xlsx',
            ], [
                'file.mimes' => 'Tipe file import harus :values.'
            ]);

            $import = new AdminImport();
            Excel::import($import, request()->file('file'));
            return back()->with('success', 'Berhasil import data Admin.');
        } else {
            return back()->with('error', 'Tolong masukan file');
        }
    }
}
