<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratRequest;
use Illuminate\Http\Request;
use App\Repository\Surat\SuratRepository;

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
        $this->suratRepository->index();
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
    public function store(SuratRequest $request)
    {
        $this->suratRepository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->suratRepository->show($id);
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
    }
}
