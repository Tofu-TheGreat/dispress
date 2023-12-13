<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Surat;
use App\Models\Instansi;
use App\Models\Pengajuan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Models\PosisiJabatan;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\DisposisiRequest;
use App\Repository\Disposisi\DisposisiRepository;

class DisposisiController extends Controller
{
    private $disposisiRepository;

    public function __construct(DisposisiRepository $disposisiRepository)
    {
        $this->disposisiRepository = $disposisiRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $disposisiList = $this->disposisiRepository->index();
        $userList = User::get();
        $posisiJabatanList = PosisiJabatan::get();

        return view('manajemen-surat.disposisi.disposisi-data', [
            'title' => 'Disposisi',
            'active1' => 'manajemen-surat',
            'active' => 'Disposisi',
            'disposisiList' => $disposisiList,
            'userList' => $userList,
            'posisiJabatanList' => $posisiJabatanList,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('admin');

        $pengajuanList = Pengajuan::where('status_pengajuan', '0')->get();
        $suratList = Surat::with('instansi')->get();
        $userList = User::get();
        $posisiJabatanList = PosisiJabatan::get();

        return view('manajemen-surat.disposisi.disposisi-create', [
            'title' => 'Create Disposisi',
            'active1' => 'manajemen-surat',
            'active' => 'Disposisi',
            'pengajuanList' => $pengajuanList,
            'suratList' => $suratList,
            'userList' => $userList,
            'posisiJabatanList' => $posisiJabatanList,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DisposisiRequest $request)
    {
        $this->authorize('admin');

        $this->disposisiRepository->store($request);
        return redirect()->back()->with('success', 'Surat telah dikirimkan kepada yang terkait');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $encryptId = Crypt::decryptString($id);
        $detailDataDisposisi = $this->disposisiRepository->show($encryptId);
        $posisiJabatanList = PosisiJabatan::get();
        $userList = User::get();

        return view('manajemen-surat.disposisi.disposisi-detail', [
            'title' => 'Detail Disposisi',
            'active1' => 'manajemen-surat',
            'active' => 'Disposisi',
            'userList' => $userList,
            'detailDataDisposisi' => $detailDataDisposisi,
            'posisiJabatanList' => $posisiJabatanList,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('admin');

        //Mengacak id agar menampilkan pesan acak untuk menjaga url
        $encryptId = Crypt::decryptString($id);
        $editData = $this->disposisiRepository->edit($encryptId);
        $pengajuanList = Pengajuan::get();
        $userList = User::get();
        $posisiJabatanList = PosisiJabatan::get();

        return view('manajemen-surat.disposisi.disposisi-edit', [
            'title' => 'Edit Disposisi',
            'active' => 'Disposisi',
            'active1' => 'manajemen-surat',
            'editDataDisposisi' => $editData,
            'pengajuanList' => $pengajuanList,
            'userList' => $userList,
            'posisiJabatanList' => $posisiJabatanList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DisposisiRequest $request, string $id)
    {
        $this->authorize('admin');

        $this->disposisiRepository->update($id, $request);
        return redirect()->intended('/disposisi')->with('success', 'Berhasil meng-update data Disposisi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('admin');

        $encryptId = Crypt::decryptString($id);
        $this->disposisiRepository->destroy($encryptId);
        return redirect()->intended('/disposisi')->with('success', 'Berhasil menghapus data Disposisi.');
    }

    public function filterData(Request $request)
    {
        $disposisiList = $this->disposisiRepository->filterData($request);
        $userList = User::get();
        $posisiJabatanList = PosisiJabatan::get();

        return view('manajemen-surat.disposisi.disposisi-data', [
            'title' => 'Disposisi',
            'active1' => 'manajemen-surat',
            'active' => 'Disposisi',
            'disposisiList' => $disposisiList,
            'userList' => $userList,
            'posisiJabatanList' => $posisiJabatanList,
        ]);
    }
    public function search(Request $request)
    {
        $disposisiList = $this->disposisiRepository->search($request);
        $userList = User::get();
        $posisiJabatanList = PosisiJabatan::get();

        return view('manajemen-surat.disposisi.disposisi-data', [
            'title' => 'Disposisi',
            'active1' => 'manajemen-surat',
            'active' => 'Disposisi',
            'disposisiList' => $disposisiList,
            'userList' => $userList,
            'posisiJabatanList' => $posisiJabatanList,
        ]);
    }
}
