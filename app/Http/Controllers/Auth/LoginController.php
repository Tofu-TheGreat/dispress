<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Repository\Login\LoginImplement;
use App\Repository\Login\LoginRepository;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    private $loginRepository;
    public function __construct(LoginRepository $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }

    public function login(LoginRequest $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');

        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $credentials = $this->loginRepository->getEmail($login);
        } else {
            $credentials = $this->loginRepository->getUsername($login);
        }

        if ($credentials) {
            if (Hash::check($password, $credentials->password)) {
                if ($credentials->level === 'admin') {
                    Alert::toast('Admin Berhasil Login', 'success');
                    Auth::login($credentials);
                    return redirect()->intended('/dashboard');
                }
            } else {
                return redirect()->back()->with('error', 'Password salah.');
            }
        } else {
            return redirect()->back()->with('error', 'Email atau Username salah.');
        }
    }

    public function logout(Request $request)
    {
        $this->loginRepository->logout($request);
        return redirect()->intended('/login');
    }
}
