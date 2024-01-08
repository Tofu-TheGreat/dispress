<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetunjukTeknisController extends Controller
{
    public function petunjukTeknis()
    {
        return view(
            'pages.petunjuk-teknis.petunjuk-teknis',
            ['title' => 'Petunjuk Teknis', 'active' => 'petunjuk-teknis']
        );
    }
    public function petunjukRegistrasi()
    {
        return view('pages.petunjuk-teknis.petunjuk-registrasi', ['title' => 'Petunjuk Registrasi', 'active' => 'petunjuk-registrasi']);
    }

    public function petunjukRole()
    {
        return view('pages.petunjuk-teknis.petunjuk-role', ['title' => 'Petunjuk Role', 'active' => 'petunjuk-role']);
    }

    public function petunjukPenggunaan()
    {
        return view('pages.petunjuk-teknis.petunjuk-penggunaan', ['title' => 'Petunjuk Penggunaan', 'active' => 'petunjuk-penggunaan']);
    }
}
