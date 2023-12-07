<?php

namespace App\Http\Controllers;

use App\Http\Requests\PosisiJabatanRequest;
use App\Models\PosisiJabatan;
use App\Repository\PosisiJabatan\PosisiJabatanRepository;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PosisiJabatanController extends Controller
{
    private $posisijabatanRepository;

    public function __construct(PosisiJabatanRepository $posisijabatanRepository)
    {
        $this->posisijabatanRepository = $posisijabatanRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posisiJabatanList = $this->posisijabatanRepository->index();
        return view('manajemen-posisi-jabatan.posisi-jabatan-data', [
            'title' => 'Posisi Jabatan',
            'active' => 'Posisi-jabatan',
            'active1' => 'Posisi-jabatan',
            'posisiJabatanList' => $posisiJabatanList
        ]);
    }

    public function indexPosisiJabatan(Request $request)
    {
        $posisiJabatanList = $this->posisijabatanRepository->index();
        return DataTables::of($posisiJabatanList)
            ->addIndexColumn()
            ->addColumn('nama_posisi_jabatan', function ($posisiJabatanList) {
                return '<span class="capitalize">' . $posisiJabatanList->nama_posisi_jabatan . '</span>';
            })
            ->addColumn('deskripsi_jabatan', function ($posisiJabatanList) {
                return '<span class="capitalize">' . $posisiJabatanList->deskripsi_jabatan . '</span>';
            })
            ->addColumn('tingkat_jabatan', function ($posisiJabatanList) {
                return '<span class="capitalize">' . $posisiJabatanList->tingkat_jabatan . '</span>';
            })
            ->addColumn('action', function ($posisiJabatanList) {
                return view('manajemen-posisi-jabatan.elements.create-button')->with('posisiJabatanList', $posisiJabatanList);
            })
            ->rawColumns(['nama_posisi_jabatan', 'deskripsi_jabatan', 'tingkat_jabatan'])
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
    public function store(PosisiJabatanRequest $request)
    {
        $this->posisijabatanRepository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $posisiJabatan = $this->posisijabatanRepository->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $posisiJabatan = $this->posisijabatanRepository->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PosisiJabatanRequest $request, string $id)
    {
        $this->posisijabatanRepository->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->posisijabatanRepository->destroy($id);
    }
}
