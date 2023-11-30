<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klasifikasi;

class KlasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nomorKlasifikasiList = Klasifikasi::all();
        return view('manajemen-surat.nomor-klasifikasi.nomor-klasifikasi-data', [
            'title' => 'Nomor Klasifikasi',
            'active' => 'Nomor-klasifikasi',
            'active1' => 'manajemen-surat',
            'nomorKlasifikasiList' => $nomorKlasifikasiList,
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
