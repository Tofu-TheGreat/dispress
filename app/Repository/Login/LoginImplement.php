<?php

namespace App\Repository\Login;

use App\Repository\Login\LoginRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginImplement implements LoginRepository
{
    public function getEmail($email)
    {
        return User::where('email', $email)->first();
    }
    public function getUsername($username)
    {
        return User::where('username', $username)->first();
    }
    public function logout($logout)
    {
        Auth::logout();
        $logout->session()->invalidate();
        $logout->session()->regenerateToken();
    }
}
