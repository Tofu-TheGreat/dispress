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

    public function petunjukDashboard()
    {
        return view('pages.petunjuk-teknis.petunjuk-dashboard', ['title' => 'Petunjuk Teknis']);
    }
}
