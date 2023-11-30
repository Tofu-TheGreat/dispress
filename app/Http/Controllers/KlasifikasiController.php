<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klasifikasi;
use Yajra\DataTables\DataTables;
use App\Repository\Klasifikasi\KlasifikasiRepository;

class KlasifikasiController extends Controller
{
    private $klasifikasiRepository;

    public function __construct(KlasifikasiRepository $klasifikasiRepository)
    {
        $this->klasifikasiRepository = $klasifikasiRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nomorKlasifikasiList = $this->klasifikasiRepository->index();
        return view('manajemen-surat.nomor-klasifikasi.nomor-klasifikasi-data', [
            'title' => 'Nomor Klasifikasi',
            'active' => 'Nomor-klasifikasi',
            'active1' => 'manajemen-surat',
            'nomorKlasifikasiList' => $nomorKlasifikasiList,
        ]);
    }

    public function indexKlasifikasi(Request $request)
    {
        // if ($request->jabatan) {
        //     // Memeriksa nilai 'jabatan' dan menyesuaikan query yang dikirimkan ajax
        //     if ($request->jabatan == "kp") {
        //         $usersList = User::where('jabatan', '0')->where('level', 'admin')->get();
        //     } else {
        //         $usersList = User::where('jabatan', $request->jabatan)->where('level', 'admin')->get();
        //     }
        //     return DataTables::of($usersList)
        //         ->addIndexColumn()
        //         ->addColumn('nama', function ($usersList) {
        //             return '<span class="capitalize">' . $usersList->nama . '</span>';
        //         })
        //         ->addColumn('nomor_telpon', function ($usersList) {
        //             return currencyPhone($usersList->nomor_telpon);
        //         })
        //         ->addColumn('akses', function ($usersList) {
        //             return '<span class="capitalize badge badge-success text-center ">' . $usersList->level . '</span>';
        //         })
        //         ->addColumn('action', function ($usersList) {
        //             return view('admin.elements.create-button')->with('usersList', $usersList);
        //         })
        //         ->rawColumns(['akses', 'nama', 'phone'])
        //         ->toJson();
        // } else {
        $klasifikasiList = $this->klasifikasiRepository->index();
        return DataTables::of($klasifikasiList)
            ->addIndexColumn()
            ->addColumn('nomor_klasifikasi', function ($klasifikasiList) {
                return '<span class="capitalize">' . $klasifikasiList->nomor_klasifikasi . '</span>';
            })
            ->addColumn('nama_klasifikasi', function ($klasifikasiList) {
                return '<span class="capitalize">' . $klasifikasiList->nomor_klasifikasi . '</span>';
            })
            ->addColumn('action', function ($klasifikasiList) {
                return view('admin.elements.create-button')->with('klasifikasiList', $klasifikasiList);
            })
            ->rawColumns(['akses', 'nama', 'phone'])
            ->toJson();
        // }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->klasifikasiRepository->store($request);
        return back()->with('success', 'Berhasil Menambah Klasfikasi Baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->klasifikasiRepository->update($request, $id);
        return back()->with('success', 'Berhasil Mengubah Klasfikasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->klasifikasiRepository->destroy($id);
        return back()->with('success', 'Berhasil Menghapus Klasfikasi');
    }
}
