<?php

namespace App\Http\Controllers;

use App\Http\Requests\DisposisiRequest;
use App\Repository\Disposisi\DisposisiRepository;
use Illuminate\Http\Request;

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
        $this->disposisiRepository->index();
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
