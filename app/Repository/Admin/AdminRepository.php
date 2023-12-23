<?php

namespace App\Repository\Admin;

interface AdminRepository
{
    public function getUserByAdmin();
    public function store($data);
    public function show($id);
    public function edit($id);
    public function update($id, $data);
    public function destroy($id);
    public function deleteImageFromUser($id);
}
