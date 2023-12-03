<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengajuanRequest;
use App\Repository\Ajukan\PengajuanRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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
        $ajukanList = $this->pengajuanRepository->index();
        return view('manajemen-surat.pengajuan_disposisi.pengajuan-disposisi-data', [
            'title' => 'Pengajuan Disposisi',
            'active' => 'Pengajuan-disposisi',
            'active1' => 'manajemen-surat',
            'ajukanList' => $ajukanList,
        ]);
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
