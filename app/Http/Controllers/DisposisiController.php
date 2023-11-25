<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Surat;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
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

        return view('manajemen-surat.disposisi.disposisi-data', [
            'title' => 'Disposisi',
            'active1' => 'manajemen-surat',
            'active' => 'Disposisi',
            'disposisiList' => $disposisiList,
            'userList' => $userList,
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
        $encryptId = Crypt::decryptString($id);
        $detailDataDisposisi = $this->disposisiRepository->show($encryptId);

        return view('manajemen-surat.disposisi.disposisi-detail', [
            'title' => 'Detail Disposisi',
            'active1' => 'manajemen-surat',
            'active' => 'Disposisi',
            'detailDataDisposisi' => $detailDataDisposisi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Mengacak id agar menampilkan pesan acak untuk menjaga url
        $encryptId = Crypt::decryptString($id);
        $editData = $this->disposisiRepository->edit($encryptId);
        $userList = User::get();

        return view('manajemen-surat.disposisi.disposisi-edit', [
            'title' => 'Edit Disposisi',
            'active' => 'Disposisi',
            'active1' => 'manajemen-surat',
            'editDataDisposisi' => $editData,
            'userList' => $userList,
        ]);
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
