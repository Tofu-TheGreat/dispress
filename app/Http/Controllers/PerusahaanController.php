<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\PerusahaanRequest;
use App\Repository\Perusahaan\PerusahaanRepository;

class PerusahaanController extends Controller
{
    private $perusahaanRepository;

    public function __construct(PerusahaanRepository $perusahaanRepository)
    {
        $this->perusahaanRepository = $perusahaanRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perusahaanList = $this->perusahaanRepository->index();

        return view('manajemen-perusahaan.perusahaan-data', [
            'title' => 'Perusahaan',
            'active' => 'Perusahaan',
            'active1' => 'Perusahaan',
            'perusahaanList' => $perusahaanList,
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
    public function store(PerusahaanRequest $request)
    {
        $this->perusahaanRepository->store($request);
        return back()->with('success', 'Berhasil menambah data perusahaan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->perusahaanRepository->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->perusahaanRepository->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PerusahaanRequest $request, string $id)
    {
        $this->perusahaanRepository->update($request, $id);
        return back()->with('success', 'Berhasil meng-edit data perusahaan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $encryptId = Crypt::decryptString($id);
        $this->perusahaanRepository->destroy($encryptId);
        return redirect()->intended('/perusahaan')->with('success', 'Berhasil menghapus data perusahaan.');
    }
}
