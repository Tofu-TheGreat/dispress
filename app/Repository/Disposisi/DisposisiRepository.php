<?php

namespace App\Repository\Disposisi;

interface DisposisiRepository
{
    public function index();
    public function store($data);
    public function show($id);
    public function edit($id);
    public function update($id, $data);
    public function destroy($id);
    public function filterDataAll($data);
    public function filterData($data);
    public function search($data);
    public function searchForuser($data);
    public function indexAdmin();
}
