<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Klasifikasi;
use App\Models\Surat;
use Illuminate\Http\Request;

class SuratTugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $klasifikasiList = Klasifikasi::get();
        $userList = User::get();
        $suratTugasList = Surat::paginate(6);

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
