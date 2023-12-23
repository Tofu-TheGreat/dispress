<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\RegWebSettingRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repository\Instansi\InstansiRepository;
use Illuminate\Http\Request;
use App\Repository\Login\LoginRepository;
use Illuminate\Support\Facades\{Auth, Hash};
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    private $loginRepository, $instansiRepository;
    public function __construct(LoginRepository $loginRepository, InstansiRepository $instansiRepository)
    {
        $this->loginRepository = $loginRepository;
        $this->instansiRepository = $instansiRepository;
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
                    Alert::toast('Admin berhasil login.', 'success');
                    Auth::login($credentials);
                    $request->session()->regenerate();
                    return redirect()->intended('/dashboard-admin');
                } elseif ($credentials->level === 'officer') {
                    Alert::toast('Officer berhasil login.', 'success');
                    Auth::login($credentials);
                    $request->session()->regenerate();
                    return redirect()->intended('/dashboard-officer');
                } elseif ($credentials->level === 'staff') {
                    Alert::toast('Staff berhasil login.', 'success');
                    Auth::login($credentials);
                    $request->session()->regenerate();
                    return redirect()->intended('/dashboard-staff');
                }
            } else {
                return redirect()->back()->with('error', 'Password salah.');
            }
        } else {
            return redirect()->back()->with('error', 'Email atau username salah.');
        }
    }

    public function logout(Request $request)
    {
        $this->loginRepository->logout($request);
        return redirect()->intended('/login')->with('success', 'Berhasil logout akun.');
    }

    public function register(RegisterRequest $request)
    {
        // $this->loginRepository->register($request);
        $user = $request->all();
        $userList = User::get();
        return view('admin.pages.web-setting-create', [
            'title' => 'Web-setting-create',
            'active' => 'web-setting',
            'active1' => 'setting',
            'userList' => $userList,
            'user' => $user
        ])->with('success', 'Berhasil register akun.');
    }
    public function register_web_setting(RegWebSettingRequest $request)
    {

        $this->loginRepository->register_web_setting($request);
        return redirect()->intended('/dashboard-admin')->with('success', 'Berhasil register akun.');
    }
}
