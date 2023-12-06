<?php

namespace App\Repository\Ajukan;

interface PengajuanRepository
{
    public function index($status);
    public function store($data);
    public function show($id);
    public function edit($id);
    public function update($id, $data);
    public function filterData($data, $status);
    public function destroy($id);
    public function search($data, $status);
}
