<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratKeluarRequest;
use App\Models\SuratKeluar;
use App\Repository\Surat\SuratRepository;
use App\Repository\SuratKeluar\SuratKeluarRepository;
use Illuminate\Http\Request;
use App\Models\Instansi;
use App\Models\User;
use App\Models\PosisiJabatan;
use App\Models\Klasifikasi;
use Illuminate\Support\Facades\Crypt;

class SuratKeluarController extends Controller
{
    private $suratKeluarRepository;
    public function __construct(SuratKeluarRepository $suratKeluarRepository)
    {
        $this->suratKeluarRepository = $suratKeluarRepository;
    }
    public function index()
    {
        $suratKeluarList = $this->suratKeluarRepository->index();
        $instansiList = Instansi::get();
        $userList = User::get();
        $klasifikasiList = Klasifikasi::get();

        return view('manajemen-surat.surat-keluar.surat-keluar-data', [
            'title' => 'Surat Keluar',
            'active1' => 'manajemen-surat',
            'active' => 'surat-keluar',
            'suratKeluarList' => $suratKeluarList,
            'instansiList' => $instansiList,
            'userList' => $userList,
            'klasifikasiList' => $klasifikasiList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('admin-officer');

        $instansiList = Instansi::get();
        $klasifikasiList = Klasifikasi::get();

        return view('manajemen-surat.surat-keluar.surat-keluar-create', [
            'title' => 'Surat Keluar Create',
            'active1' => 'manajemen-surat',
            'active' => 'surat-keluar',
            'instansiList' => $instansiList,
            'klasifikasiList' => $klasifikasiList,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuratKeluarRequest $request)
    {
        $this->authorize('admin-officer');

        $this->suratKeluarRepository->store($request);
        return redirect()->intended('/surat-keluar')->with('success', 'Berhasil membuat data surat keluar.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $encryptId = Crypt::decryptString($id);
        $detailDataSuratKeluar = $this->suratKeluarRepository->show($encryptId);
        $instansiList = Instansi::get();
        $klasifikasiList = Klasifikasi::get();
        return view('manajemen-surat.surat-keluar.surat-keluar-detail', [
            'title' => 'Surat Keluar Create',
            'active1' => 'manajemen-surat',
            'active' => 'surat-keluar',
            'detailDataSuratKeluar' => $detailDataSuratKeluar,
            'instansiList' => $instansiList,
            'klasifikasiList' => $klasifikasiList,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('admin-officer');
        $encryptId = Crypt::decryptString($id);
        $editDataSuratKeluar = $this->suratKeluarRepository->show($encryptId);
        $instansiList = Instansi::get();
        $klasifikasiList = Klasifikasi::get();
        return view('manajemen-surat.surat-keluar.surat-keluar-edit', [
            'title' => 'Surat Keluar Create',
            'active1' => 'manajemen-surat',
            'active' => 'surat-keluar',
            'editDataSuratKeluar' => $editDataSuratKeluar,
            'instansiList' => $instansiList,
            'klasifikasiList' => $klasifikasiList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuratKeluarRequest $request, string $id)
    {
        $this->authorize('admin-officer');
        $this->suratKeluarRepository->update($id, $request);
        return redirect()->intended('surat-keluar')->with('success', 'Berhasil mengubah data surat keluar.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('admin-officer');
        $encryptId = Crypt::decryptString($id);
        $this->suratKeluarRepository->destroy($encryptId);
        return redirect()->intended('surat-keluar')->with('success', 'Berhasil menghapus data surat keluar.');
    }
    public function filterData(Request $request)
    {
        $suratKeluarList =  $this->suratKeluarRepository->filterData($request);
        $klasifikasiList = Klasifikasi::get();
        $instansiList = Instansi::get();
        $userList = User::get();
        return view('manajemen-surat.surat-keluar.surat-keluar-data', [
            'title' => 'Surat Keluar',
            'active1' => 'manajemen-surat',
            'active' => 'surat-keluar',
            'suratKeluarList' => $suratKeluarList,
            'instansiList' => $instansiList,
            'userList' => $userList,
            'klasifikasiList' => $klasifikasiList,
        ]);
    }
    public function search(Request $request)
    {
        $suratKeluarList = $this->suratKeluarRepository->search($request);
        $klasifikasiList = Klasifikasi::get();
        $instansiList = Instansi::get();
        $userList = User::get();
        return view('manajemen-surat.surat-keluar.surat-keluar-data', [
            'title' => 'Surat Keluar',
            'active1' => 'manajemen-surat',
            'active' => 'surat-keluar',
            'suratKeluarList' => $suratKeluarList,
            'instansiList' => $instansiList,
            'userList' => $userList,
            'klasifikasiList' => $klasifikasiList,
        ]);
    }
}
