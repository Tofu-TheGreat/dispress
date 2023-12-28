<?php

namespace App\Http\Controllers;

use App\Models\User;
use Mockery\Undefined;
use App\Models\Instansi;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use App\Models\PosisiJabatan;
use App\Http\Requests\SuratRequest;
use function Laravel\Prompts\select;

use Illuminate\Support\Facades\Crypt;
use App\Repository\Surat\SuratRepository;

class SuratController extends Controller
{
    private $suratRepository;
    public function __construct(SuratRepository $suratRepository)
    {
        $this->suratRepository = $suratRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suratList = $this->suratRepository->index();
        $pengajuanCount = $this->suratRepository->getPengajuan();
        $instansiList = Instansi::get();
        $userList = User::get();
        $adminList = User::where('level', 'admin')->get();
        $klasifikasiList = Klasifikasi::get();
        $posisiJabatanList = PosisiJabatan::get();

        return view('manajemen-surat.surat-masuk.surat-masuk-data', [
            'title' => 'Surat Masuk',
            'active1' => 'manajemen-surat',
            'active' => 'Surat-masuk',
            'suratList' => $suratList,
            'instansiList' => $instansiList,
            'userList' => $userList,
            'adminList' => $adminList,
            'posisiJabatanList' => $posisiJabatanList,
            'klasifikasiList' => $klasifikasiList,
            'pengajuanCount' => $pengajuanCount,
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

        return view('manajemen-surat.surat-masuk.surat-masuk-create', [
            'title' => 'Create Surat Masuk',
            'active1' => 'manajemen-surat',
            'active' => 'Surat-masuk',
            'instansiList' => $instansiList,
            'klasifikasiList' => $klasifikasiList,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuratRequest $request)
    {
        $this->authorize('admin-officer');

        $this->suratRepository->store($request);
        return redirect()->intended('/surat')->with('success', 'Berhasil membuat data surat masuk.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $encryptId = Crypt::decryptString($id);
        $detailDataSurat = $this->suratRepository->show($encryptId);
        $userget = User::where('id_user', $detailDataSurat->id_user)->first();
        $instansiList = Instansi::where('id_instansi', $detailDataSurat->id_instansi)->get();
        $klasifikasiList = Klasifikasi::get();


        return view('manajemen-surat.surat-masuk.surat-masuk-detail', [
            'title' => 'Detail Surat Masuk',
            'active1' => 'manajemen-surat',
            'active' => 'Surat-masuk',
            'detailDataSurat' => $detailDataSurat,
            'userget' => $userget,
            'instansiList' => $instansiList[0],
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
        $editDataSurat = $this->suratRepository->show($encryptId);
        $instansiList = Instansi::get();
        $klasifikasiList = Klasifikasi::get();
        // dd($editDataSurat->id_surat);
        return view('manajemen-surat.surat-masuk.surat-masuk-edit', [
            'title' => 'Edit Surat Masuk',
            'active1' => 'manajemen-surat',
            'active' => 'Surat-masuk',
            'editDataSurat' => $editDataSurat,
            'instansiList' => $instansiList,
            'klasifikasiList' => $klasifikasiList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuratRequest $request, string $id)
    {
        $this->authorize('admin-officer');

        $this->suratRepository->update($id, $request);
        return redirect()->intended('/surat')->with('success', 'Berhasil mengubah data surat masuk.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('admin-officer');

        $encryptId = Crypt::decryptString($id);
        $this->suratRepository->destroy($encryptId);
        return redirect()->intended('/surat')->with('success', 'Berhasil menghapus data surat masuk.');
    }

    public function filterData(Request $request)
    {
        $suratList =  $this->suratRepository->filterData($request);
        $instansiList = Instansi::get();
        $userList = User::get();
        $klasifikasiList = Klasifikasi::get();
        $pengajuanCount = $this->suratRepository->getPengajuan();

        return view('manajemen-surat.surat-masuk.surat-masuk-data', [
            'title' => 'Surat Masuk',
            'active1' => 'manajemen-surat',
            'active' => 'Surat-masuk',
            'suratList' => $suratList,
            'instansiList' => $instansiList,
            'userList' => $userList,
            'klasifikasiList' => $klasifikasiList,
            'pengajuanCount' => $pengajuanCount,
        ]);;
    }
    public function verifikasi_surat(SuratRequest $request, string $id)
    {
        $this->authorize('admin-officer');

        $this->suratRepository->update($id, $request);
        return back()->with('success', 'Perubahan akan dikirimkan ke yang terkait.');
    }

    public function search(Request $request)
    {
        $suratList = $this->suratRepository->search($request);
        $instansiList = Instansi::get();
        $userList = User::get();
        $klasifikasiList = Klasifikasi::get();
        $pengajuanCount = $this->suratRepository->getPengajuan();

        return view('manajemen-surat.surat-masuk.surat-masuk-data', [
            'title' => 'Surat Masuk',
            'active1' => 'manajemen-surat',
            'active' => 'Surat-masuk',
            'suratList' => $suratList,
            'instansiList' => $instansiList,
            'userList' => $userList,
            'klasifikasiList' => $klasifikasiList,
            'pengajuanCount' => $pengajuanCount,
        ]);
    }
}
