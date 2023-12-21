<?php

namespace App\Http\Controllers;

use App\Models\PosisiJabatan;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $usersList = User::where('id_user', auth()->user()->id_user)->get();
        $posisiJabatanList = PosisiJabatan::get();

        return view('admin.pages.profile', [
            'title' => 'Profile',
            'active' => 'profile',
            'active1' => 'setting',
            'dataProfile' => $usersList[0],
            'posisiJabatanList' => $posisiJabatanList,
        ]);
    }
}
