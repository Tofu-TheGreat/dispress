<?php

namespace App\Http\Controllers;

use App\Models\PosisiJabatan;
use Illuminate\Http\Request;

class PosisiJabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posisiJabatanList = PosisiJabatan::get();
        return view('manajemen-posisi-jabatan.posisi-jabatan-data', [
            'title' => 'Posisi Jabatan',
            'active' => 'Posisi-jabatan',
            'active1' => 'Posisi-jabatan',
            'posisiJabatanList' => $posisiJabatanList
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
