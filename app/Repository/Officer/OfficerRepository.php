<?php

namespace App\Repository\Officer;

interface OfficerRepository
{
    public function getUserByOfficer();
    public function store($data);
    public function show($id);
    public function edit($id);
    public function update($id, $data);
    public function destroy($id);
    public function deleteImageFromUser($id);
}
