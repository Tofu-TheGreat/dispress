<?php

namespace App\Repository\Instansi;

interface InstansiRepository
{
    public function index();
    public function store($data);
    public function show(string $id);
    public function edit(string $id);
    public function update($data, string $id);
    public function destroy(string $id);
}
