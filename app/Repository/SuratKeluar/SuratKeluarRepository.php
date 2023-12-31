<?php

namespace App\Repository\SuratKeluar;

interface SuratKeluarRepository
{
    public function index();
    public function store($data);
    public function show($id);
    public function edit($id);
    public function update($id, $data);
    public function destroy($id);
    public function filterData($data);
    public function search($data);
}
