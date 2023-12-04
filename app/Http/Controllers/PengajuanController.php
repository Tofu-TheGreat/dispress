<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\PengajuanRequest;
use App\Models\Surat;
use App\Repository\Ajukan\PengajuanRepository;

class PengajuanController extends Controller
{
    private $pengajuanRepository;

    public function __construct(PengajuanRepository $pengajuanRepository)
    {
        $this->pengajuanRepository = $pengajuanRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuanList = $this->pengajuanRepository->index();
        $userList = User::get();
        $klasifikasiList = Klasifikasi::get();
        return view('manajemen-surat.pengajuan_disposisi.pengajuan-disposisi-data', [
            'title' => 'Pengajuan Disposisi',
            'active' => 'Pengajuan-disposisi',
            'active1' => 'manajemen-surat',
            'pengajuanList' => $pengajuanList,
            'userList' => $userList,
            'klasifikasiList' => $klasifikasiList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $klasifikasiList = Klasifikasi::get();
        $userList = User::get();
        $suratList = Surat::get();

        return view('manajemen-surat.pengajuan_disposisi.pengajuan-disposisi-create', [
            'title' => 'Create Pengajuan Disposisi',
            'active' => 'Pengajuan-disposisi',
            'active1' => 'manajemen-surat',
            'suratList' => $suratList,
            'userList' => $userList,
            'klasifikasiList' => $klasifikasiList,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PengajuanRequest $request)
    {
        $this->pengajuanRepository->store($request);
        return back()->with('success', 'Berhasil Mengajukan Surat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $encryptId = Crypt::decryptString($id);
        $detailDataAjukan = $this->pengajuanRepository->show($encryptId);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $encryptId = Crypt::decryptString($id);
        $detailDataAjukan = $this->pengajuanRepository->edit($encryptId);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PengajuanRequest $request, string $id)
    {
        $this->pengajuanRepository->update($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->pengajuanRepository->destroy($id);
    }

    public function filterData(Request $request)
    {
        $ajukanList =  $this->pengajuanRepository->filterData($request);
    }


    public function search(Request $request)
    {
        $ajukanList = $this->pengajuanRepository->search($request);
    }
}
