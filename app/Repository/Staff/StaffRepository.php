<?php

namespace App\Repository\Staff;

interface StaffRepository
{
    public function getUserByStaff();
    public function store($data);
    public function show($id);
    public function edit($id);
    public function update($id, $data);
    public function destroy($id);
    public function deleteImageFromUser($id);
}
