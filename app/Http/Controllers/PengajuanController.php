<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\PengajuanRequest;
use App\Models\Pengajuan;
use App\Models\PosisiJabatan;
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
        $this->authorize('admin-officer');

        $pengajuanList0 = $this->pengajuanRepository->index('0');
        $pengajuanList1 = $this->pengajuanRepository->index('1');
        $userList = User::get();
        $klasifikasiList = Klasifikasi::get();
        $posisiJabatanList = PosisiJabatan::get();

        return view('manajemen-surat.pengajuan_disposisi.pengajuan-disposisi-data', [
            'title' => 'Pengajuan Disposisi',
            'active' => 'Pengajuan-disposisi',
            'active1' => 'manajemen-surat',
            // 'pengajuanList' => $pengajuanList,
            'pengajuanList0' => $pengajuanList0,
            'pengajuanList1' => $pengajuanList1,
            'userList' => $userList,
            'posisiJabatanList' => $posisiJabatanList,
            'klasifikasiList' => $klasifikasiList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('admin-officer');

        $klasifikasiList = Klasifikasi::get();
        $userList = User::get();
        $suratList = Surat::where('status_verifikasi', '1')->get();

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
        $this->authorize('admin-officer');

        $this->pengajuanRepository->store($request);
        return redirect()->intended('pengajuan-disposisi')->with('success', 'Berhasil membuat pengajuan surat untuk Didisposisikan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $this->authorize('admin-officer');

        $encryptId = Crypt::decryptString($id);
        $detailDataPengajuan = $this->pengajuanRepository->show($encryptId);

        return view('manajemen-surat.pengajuan_disposisi.pengajuan-disposisi-detail', [
            'title' => 'Detail Pengajuan Disposisi',
            'active' => 'Pengajuan-disposisi',
            'active1' => 'manajemen-surat',
            'detailDataPengajuan' => $detailDataPengajuan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('admin-officer');

        $encryptId = Crypt::decryptString($id);
        $editDataPengajuan = $this->pengajuanRepository->edit($encryptId);
        $klasifikasiList = Klasifikasi::get();
        $userList = User::get();

        return view('manajemen-surat.pengajuan_disposisi.pengajuan-disposisi-edit', [
            'title' => 'Edit Pengajuan Disposisi',
            'active' => 'Pengajuan-disposisi',
            'active1' => 'manajemen-surat',
            'editDataPengajuan' => $editDataPengajuan,
            'klasifikasiList' => $klasifikasiList,
            'userList' => $userList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PengajuanRequest $request, string $id)
    {
        $this->authorize('admin-officer');

        $this->pengajuanRepository->update($id, $request);
        return redirect()->intended('pengajuan-disposisi')->with('success', 'Berhasil mengubah data Pengajuan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('admin-officer');

        $encryptId = Crypt::decryptString($id);
        $this->pengajuanRepository->destroy($encryptId);
        return redirect()->intended('/pengajuan-disposisi')->with('success', 'Berhasil menghapus data Pengajuan.');
    }

    public function filterData(Request $request)
    {
        $this->authorize('admin-officer');

        $pengajuanList0 =  $this->pengajuanRepository->filterData($request, '0');
        $pengajuanList1 =  $this->pengajuanRepository->filterData($request, '1');
        $posisiJabatanList = PosisiJabatan::get();
        $userList = User::get();
        $klasifikasiList = Klasifikasi::get();
        return view('manajemen-surat.pengajuan_disposisi.pengajuan-disposisi-data', [
            'title' => 'Pengajuan Disposisi',
            'active' => 'Pengajuan-disposisi',
            'active1' => 'manajemen-surat',
            // 'pengajuanList' => $pengajuanList,
            'pengajuanList0' => $pengajuanList0,
            'pengajuanList1' => $pengajuanList1,
            'userList' => $userList,
            'klasifikasiList' => $klasifikasiList,
            'posisiJabatanList' => $posisiJabatanList,
        ]);
    }


    public function search(Request $request)
    {
        $this->authorize('admin-officer');

        $page = $request->query('page', 1); // Default to page 1 if not present
        $pengajuanList0 = $this->pengajuanRepository->search($request, '0')->appends(['page0' => $page]);
        $pengajuanList1 = $this->pengajuanRepository->search($request, '1')->appends(['page1' => $page]);
        $userList = User::get();
        $klasifikasiList = Klasifikasi::get();
        $posisiJabatanList = PosisiJabatan::get();
        return view('manajemen-surat.pengajuan_disposisi.pengajuan-disposisi-data', [
            'title' => 'Pengajuan Disposisi',
            'active' => 'Pengajuan-disposisi',
            'active1' => 'manajemen-surat',
            // 'pengajuanList' => $pengajuanList,
            'pengajuanList0' => $pengajuanList0,
            'pengajuanList1' => $pengajuanList1,
            'userList' => $userList,
            'klasifikasiList' => $klasifikasiList,
            'posisiJabatanList' => $posisiJabatanList,
        ]);
    }
}
