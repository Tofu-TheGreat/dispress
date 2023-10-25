<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function username()
    {
        $login = request()->input('login');

        // Mencari apakah input cocok dengan email
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Mencocokkan input dengan baik email maupun username
        return $field;
    }


    public function login(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');

        // Cek apakah input mungkin adalah alamat email
        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $credentials = ['email' => $login, 'password' => $password];
        } else {
            $credentials = ['username' => $login, 'password' => $password];
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->level === 'admin') {
                return redirect()->intended('/dashboard');
            }
        } else {
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended('/login');
    }
}
