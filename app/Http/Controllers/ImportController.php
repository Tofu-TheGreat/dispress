<?php

namespace App\Http\Controllers;

use App\Imports\AdminImport;
use App\Imports\InstansiImport;
use App\Imports\KlasifikasiImport;
use App\Imports\PosisiJabatanImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use App\Imports\UserImport;

class ImportController extends Controller
{
    public function import_user(Request $request)
    {
        $this->authorize('admin');

        if (request()->has('file')) {
            $request->validate([
                'file' => 'mimes:xlsx',
            ], [
                'file.mimes' => 'Tipe file import harus :values.'
            ]);

            $import = new UserImport();
            Excel::import($import, request()->file('file'));
            return back()->with('success', 'Berhasil import data Admin.');
        } else {
            return back()->with('error', 'Tolong masukan file');
        }
    }
    public function import_instansi(Request $request)
    {
        if (request()->has('file')) {
            $request->validate([
                'file' => 'mimes:xlsx',
            ], [
                'file.mimes' => 'Tipe file import harus :values.'
            ]);

            $import = new InstansiImport();
            Excel::import($import, request()->file('file'));
            return back()->with('success', 'Berhasil import data Instansi.');
        } else {
            return back()->with('error', 'Tolong masukan file');
        }
    }
    public function import_nomorklasifikasi(Request $request)
    {
        if (request()->has('file')) {
            $request->validate([
                'file' => 'mimes:xlsx',
            ], [
                'file.mimes' => 'Tipe file import harus :values.'
            ]);

            $import = new KlasifikasiImport();
            Excel::import($import, request()->file('file'));
            return back()->with('success', 'Berhasil import data Nomor Klasifikasi.');
        } else {
            return back()->with('error', 'Tolong masukan file.');
        }
    }
    public function import_posisijabatan(Request $request)
    {
        if (request()->has('file')) {
            $request->validate([
                'file' => 'mimes:xlsx',
            ], [
                'file.mimes' => 'Tipe file import harus :values.'
            ]);

            $import = new PosisiJabatanImport();
            Excel::import($import, request()->file('file'));
            return back()->with('success', 'Berhasil import data Posisi Jabatan.');
        } else {
            return back()->with('error', 'Tolong masukan file.');
        }
    }
}
