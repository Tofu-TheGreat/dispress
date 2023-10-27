<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Repository\Login\LoginImplement;
use App\Repository\Login\LoginRepository;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    private $loginRepository;
    public function __construct(LoginRepository $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }

    public function login(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');

        // Cek apakah input mungkin adalah alamat email
        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $credentials = $this->loginRepository->getEmail($login);
        } else {
            $credentials = $this->loginRepository->getUsername($login);
        }

        if ($credentials && Hash::check($password, $credentials->password)) {
            if ($credentials->level === 'admin') {
                Auth::login($credentials);
                return redirect()->intended('/dashboard');
            }
        } else {
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        $this->loginRepository->logout($request);
        return redirect()->intended('/login');
    }
}
