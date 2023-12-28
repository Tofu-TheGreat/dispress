<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\InstansiRequest;
use App\Repository\Instansi\InstansiRepository;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    private $instansiRepository;

    public function __construct(InstansiRepository $instansiRepository)
    {
        $this->instansiRepository = $instansiRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instansiList = $this->instansiRepository->index();

        return view('manajemen-instansi.instansi-data', [
            'title' => 'Instansi',
            'active' => 'Instansi',
            'active1' => 'Instansi',
            'instansiList' => $instansiList,
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
    public function store(InstansiRequest $request)
    {
        $this->authorize('admin-officer');
        $this->instansiRepository->store($request);
        return back()->with('success', 'Berhasil menambah data instansi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->instansiRepository->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('admin-officer');

        $this->instansiRepository->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InstansiRequest $request, string $id)
    {
        $this->authorize('admin-officer');

        $this->instansiRepository->update($request, $id);
        return back()->with('success', 'Berhasil mengubah data instansi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('admin-officer');

        $encryptId = Crypt::decryptString($id);
        $this->instansiRepository->destroy($encryptId);
        return redirect()->intended('/instansi')->with('success', 'Berhasil menghapus data instansi.');
    }

    public function search(Request $request)
    {
        $instansiList = $this->instansiRepository->search($request);

        return view('manajemen-instansi.instansi-data', [
            'title' => 'Instansi',
            'active' => 'Instansi',
            'active1' => 'Instansi',
            'instansiList' => $instansiList,
        ]);
    }
}
