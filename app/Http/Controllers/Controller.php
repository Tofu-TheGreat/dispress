<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard()
    {
        return view('admin.pages.dashboard', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'active1' => 'dashboard',
        ]);
    }
}
