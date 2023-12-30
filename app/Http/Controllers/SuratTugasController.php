<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratTugasRequest;
use App\Models\User;
use App\Models\Klasifikasi;
use App\Models\Surat;
use App\Repository\SuratTugas\SuratTugasRepository;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuratTugasRequest $request)
    {
        $this->suratTugasRepository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataSuratTugas = $this->suratTugasRepository->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataSuratTugas = $this->suratTugasRepository->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuratTugasRequest $request, string $id)
    {
        $this->suratTugasRepository->update($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->suratTugasRepository->destroy($id);
    }

    public function filterData(Request $request)
    {
    }
    public function search(Request $request)
    {
        $this->suratTugasRepository->search($request);
    }
}
