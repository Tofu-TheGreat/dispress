<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebSettingController extends Controller
{
    public function index()
    {
        return view('admin.pages.web-setting', [
            'title' => 'Web-setting',
            'active' => 'web-setting',
            'active1' => 'setting',
        ]);
    }
}
