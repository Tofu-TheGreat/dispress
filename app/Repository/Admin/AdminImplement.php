<?php

namespace App\Repository\Admin;

use App\Models\User;

class AdminImplement implements AdminRepository
{
    public function getUserByAdmin()
    {
        return User::where('level', 'admin')->paginate(6);
    }
}
