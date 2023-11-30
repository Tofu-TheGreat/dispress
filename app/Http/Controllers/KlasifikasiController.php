<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Crypt;
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
        $klasifikasiList = $this->klasifikasiRepository->index();
        return DataTables::of($klasifikasiList)
            ->addIndexColumn()
            ->addColumn('nomor_klasifikasi', function ($klasifikasiList) {
                return '<span class="capitalize">' . $klasifikasiList->nomor_klasifikasi . '</span>';
            })
            ->addColumn('nama_klasifikasi', function ($klasifikasiList) {
                return '<span class="capitalize">' . $klasifikasiList->nama_klasifikasi . '</span>';
            })
            ->addColumn('action', function ($klasifikasiList) {
                return view('manajemen-surat.nomor-klasifikasi.elements.create-button')->with('klasifikasiList', $klasifikasiList);
            })
            ->rawColumns(['nomor_klasifikasi', 'nama_klasifikasi', 'phone'])
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
        return back()->with('success', 'Berhasil menambah data nomor klasfikasi baru.');
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
        return back()->with('success', 'Berhasil mengubah data nomor klasfikasi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $encryptId = Crypt::decryptString($id);
        $this->klasifikasiRepository->destroy($encryptId);
        return back()->with('success', 'Berhasil menghapus data nomor klasfikasi.');
    }
}
