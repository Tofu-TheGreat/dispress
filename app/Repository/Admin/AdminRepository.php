<?php

namespace App\Repository\Admin;

interface AdminRepository
{
    public function getUserByAdmin();
    public function store($data);
}
