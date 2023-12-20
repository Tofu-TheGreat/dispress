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
            'title' => 'Admin',
            'active' => 'Admin',
            'active1' => 'users',
            'dataProfile' => $usersList[0],
            'posisiJabatanList' => $posisiJabatanList,
        ]);
    }
}
