<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratRequest;
use App\Models\Perusahaan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repository\Surat\SuratRepository;

use function Laravel\Prompts\select;

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
        foreach ($suratList as $surat) {
            $perusahaanId = $surat->id_perusahaan;
            $perusahaan = Perusahaan::find($perusahaanId);


            if ($perusahaan) {
                $perusahaanList[] = $perusahaan;
            }
        };
        return view('manajemen-surat.surat-masuk.surat-masuk-data', [
            'title' => 'Surat Masuk',
            'active1' => 'manajemen-surat',
            'active' => 'Surat-masuk',
            'suratList' => $suratList,
            'perusahaanList' => $perusahaanList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $perusahaanList = Perusahaan::get();
        return view('manajemen-surat.surat-masuk.surat-masuk-create', [
            'title' => 'Create Surat Masuk',
            'active1' => 'manajemen-surat',
            'active' => 'Surat-masuk',
            'perusahaanList' => $perusahaanList
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuratRequest $request)
    {
        $this->suratRepository->store($request);
        return redirect()->intended('/surat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detailDataSurat = $this->suratRepository->show($id);
        $userget = User::where('id_user', $detailDataSurat->id_user)->first();
        $perusahaanList = Perusahaan::where('id_perusahaan', $detailDataSurat->id_perusahaan)->get();

        return view('manajemen-surat.surat-masuk.surat-masuk-detail', [
            'title' => 'Detail Surat Masuk',
            'active1' => 'manajemen-surat',
            'active' => 'Surat-masuk',
            'detailDataSurat' => $detailDataSurat,
            'userget' => $userget,
            'perusahaanList' => $perusahaanList[0]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->suratRepository->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuratRequest $request, string $id)
    {
        $this->suratRepository->update($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->suratRepository->destroy($id);
        return back();
    }
}
