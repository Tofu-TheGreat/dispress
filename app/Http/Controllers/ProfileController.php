<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\PosisiJabatan;
use App\Models\User;
use App\Repository\Profile\ProfileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    private $profileRepository;

    public function __construct(ProfileRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function index()
    {
        $usersList = $this->profileRepository->userGet();
        $posisiJabatanList = $this->profileRepository->posisiJabatanGet();
        $getSuratCount = $this->profileRepository->getSuratByUser();
        $getPengajuanCount = $this->profileRepository->getPengajuanByUser();
        $getDisposisiByUserCount = $this->profileRepository->getDisposisiByUser();
        $getDisposisiForUserCount = $this->profileRepository->getDisposisiForUser();
        $getSuratKeluarForUserCount = $this->profileRepository->getSuratKeluarForUser();

        return view('admin.pages.profile', [
            'title' => 'Profile',
            'active' => 'profile',
            'active1' => 'setting',
            'dataProfile' => $usersList,
            'posisiJabatanList' => $posisiJabatanList,
            'getSuratCount' => $getSuratCount,
            'getDisposisiByUserCount' => $getDisposisiByUserCount,
            'getDisposisiForUserCount' => $getDisposisiForUserCount,
            'getSuratKeluarForUserCount' => $getSuratKeluarForUserCount,
            'getPengajuanCount' => $getPengajuanCount,
        ]);
    }
    public function editProfile(UserRequest $request, $id)
    {
        $this->profileRepository->editProfile($request, $id);

        return redirect()->intended('/profile')->with('success', 'Data profilmu telah ter-update.');
    }
    public function changePassword(ChangePasswordRequest $request, $id)
    {
        if (!Hash::check($request->password_lama, Auth::user()->password)) {
            return redirect()->intended('/profile')->with('password_lama', 'Password lama Tidak sesuai.');
        }
        $this->profileRepository->changePassword($request, $id);
        return redirect()->intended('/profile')->with('success', 'Berhasil Mengubah Password.');
    }
}
