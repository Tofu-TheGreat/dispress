<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Surat;
use App\Models\SuratTugas;
use App\Models\WebSetting;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\SuratTugasRequest;
use App\Repository\SuratTugas\SuratTugasRepository;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class SuratTugasController extends Controller
{
    private $suratTugasRepository;

    public function __construct(SuratTugasRepository $suratTugasRepository)
    {
        $this->suratTugasRepository = $suratTugasRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $klasifikasiList = Klasifikasi::get();
        $userList = User::get();
        $suratTugasList =  $this->suratTugasRepository->index();

        return view('manajemen-surat.surat-tugas.surat-tugas-data', [
            'title' => 'Surat Tugas',
            'active1' => 'surat-keluar',
            'active' => 'surat-tugas',
            'klasifikasiList' => $klasifikasiList,
            'userList' => $userList,
            'suratTugasList' => $suratTugasList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('admin');

        $klasifikasiList = Klasifikasi::get();
        $userList = User::get();
        $suratMasukList = Surat::with('instansi')->get();

        return view('manajemen-surat.surat-tugas.surat-tugas-create', [
            'title' => 'Surat Tugas Create',
            'active1' => 'surat-keluar',
            'active' => 'surat-tugas',
            'klasifikasiList' => $klasifikasiList,
            'userList' => $userList,
            'suratMasukList' => $suratMasukList,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuratTugasRequest $request)
    {
        $this->authorize('admin');

        $this->suratTugasRepository->store($request);
        return redirect()->intended('/surat-tugas')->with('success', 'Berhasil membuat data surat tugas.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $encryptId = Crypt::decryptString($id);
        $detailDataSuratTugas = $this->suratTugasRepository->show($encryptId);
        $klasifikasiList = Klasifikasi::get();
        $userList = User::get();
        $suratMasukList = Surat::with('instansi')->get();

        return view('manajemen-surat.surat-tugas.surat-tugas-detail', [
            'title' => 'Surat Tugas Detail',
            'active1' => 'surat-keluar',
            'active' => 'surat-tugas',
            'klasifikasiList' => $klasifikasiList,
            'userList' => $userList,
            'suratMasukList' => $suratMasukList,
            'detailDataSuratTugas' => $detailDataSuratTugas,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('admin');

        $encryptId = Crypt::decryptString($id);
        $editDataSuratTugas = $this->suratTugasRepository->edit($encryptId);
        $klasifikasiList = Klasifikasi::get();
        $userList = User::get();
        $suratMasukList = Surat::with('instansi')->get();

        return view('manajemen-surat.surat-tugas.surat-tugas-edit', [
            'title' => 'Surat Tugas Edit',
            'active1' => 'surat-keluar',
            'active' => 'surat-tugas',
            'klasifikasiList' => $klasifikasiList,
            'userList' => $userList,
            'suratMasukList' => $suratMasukList,
            'editDataSuratTugas' => $editDataSuratTugas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuratTugasRequest $request, string $id)
    {
        $this->authorize('admin');

        $this->suratTugasRepository->update($id, $request);
        return redirect()->intended('surat-tugas')->with('success', 'Berhasil mengubah data surat tugas.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $encryptId = Crypt::decryptString($id);
        $this->suratTugasRepository->destroy($encryptId);
        return redirect()->intended('surat-tugas')->with('success', 'Berhasil menghapus data surat tugas.');
    }

    public function cetakSuratTugas($id)
    {
        $encryptId = Crypt::decryptString($id);
        $dataSuratTugas = SuratTugas::where('id_surat_tugas', $encryptId)->first();
        $dataWeb = WebSetting::first();
        // $pdfcetak = $this->disposisiRepository->cetakDisposisi($encryptId);

        // return $pdfcetak->stream();

        $pdf = PDF::loadView(
            'manajemen-surat.surat-tugas.surat-tugas-cetak',
            ['dataSuratTugas' => $dataSuratTugas, 'dataWeb' => $dataWeb]
        );

        // You can save the PDF to a file or return it as a response.
        // Example: Save to a file
        // $pdf->save(storage_path('app/public/example.pdf'));

        // Example: Return as a response
        return $pdf->stream('example.pdf');
    }

    public function filterData(Request $request)
    {
    }
    public function search(Request $request)
    {
        $this->suratTugasRepository->search($request);
    }
}
