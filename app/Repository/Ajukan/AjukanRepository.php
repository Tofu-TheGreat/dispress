<?php

namespace App\Repository\Ajukan;

interface AjukanRepository
{
    public function index();
    public function store($data);
    public function show($id);
    public function edit($id);
    public function update($id, $data);
    public function filterData($data);
    public function destroy($id);
    public function search($data);
}
