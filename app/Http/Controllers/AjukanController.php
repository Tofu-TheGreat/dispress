<?php

namespace App\Http\Controllers;

use App\Http\Requests\AjukanRequest;
use App\Repository\Ajukan\AjukanRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AjukanController extends Controller
{
    private $ajukanRepository;

    public function __construct(AjukanRepository $ajukanRepository)
    {
        $this->ajukanRepository = $ajukanRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ajukanList = $this->ajukanRepository->index();
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
    public function store(AjukanRequest $request)
    {
        $this->ajukanRepository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $encryptId = Crypt::decryptString($id);
        $detailDataAjukan = $this->ajukanRepository->show($encryptId);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $encryptId = Crypt::decryptString($id);
        $detailDataAjukan = $this->ajukanRepository->edit($encryptId);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AjukanRequest $request, string $id)
    {
        $this->ajukanRepository->update($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->ajukanRepository->destroy($id);
    }

    public function filterData(Request $request)
    {
        $ajukanList =  $this->ajukanRepository->filterData($request);
    }


    public function search(Request $request)
    {
        $ajukanList = $this->ajukanRepository->search($request);
    }
}
