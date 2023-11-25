<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Perusahaan;
use App\Models\Surat;
use Illuminate\Http\Request;
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
        $perusahaanList = Perusahaan::get();
        $userList = User::get();
        $suratList = Surat::get();

        return view('manajemen-surat.disposisi.disposisi-data', [
            'title' => 'Disposisi',
            'active1' => 'manajemen-surat',
            'active' => 'Disposisi',
            'disposisiList' => $disposisiList,
            'perusahaanList' => $perusahaanList,
            'userList' => $userList,
            'suratList' => $suratList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $perusahaanList = Perusahaan::get();
        $suratList = Surat::get();
        return view('manajemen-surat.disposisi.disposisi-create', [
            'title' => 'Create Disposisi',
            'active1' => 'manajemen-surat',
            'active' => 'Disposisi',
            'perusahaanList' => $perusahaanList,
            'suratList' => $suratList,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DisposisiRequest $request)
    {
        $this->disposisiRepository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataDisposisi = $this->disposisiRepository->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataDisposisi = $this->disposisiRepository->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DisposisiRequest $request, string $id)
    {
        $this->disposisiRepository->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->disposisiRepository->destroy($id);
    }
}
