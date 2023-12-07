<?php

namespace App\Repository\PosisiJabatan;

interface PosisiJabatanRepository
{
    public function index();
    public function store($data);
    public function show($id);
    public function edit($id);
    public function update($id, $data);
    public function destroy($id);
}
