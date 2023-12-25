<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\PosisiJabatan;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repository\Officer\OfficerRepository;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class OfficerController extends Controller
{
    private $officerRepository;

    public function __construct(OfficerRepository $officerRepository)
    {
        // Menetapkan objek OfficerRepository yang diberikan ke properti $officerRepository
        //Semua function yang dipakai berada di App/Repository/Admin/AdminImplement.php
        $this->officerRepository = $officerRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usersList = $this->officerRepository->getUserbyOfficer();
        $posisiJabatanList = PosisiJabatan::get();

        return view('admin.officers.officer-data', [
            'title' => 'Officer',
            'active' => 'Officer',
            'active1' => 'users',
            'users' => $usersList,
            'posisiJabatanList' => $posisiJabatanList,
        ]);
    }

    public function indexAdmin(Request $request)
    {
        if ($request->jabatan) {
            if ($request->jabatan == "kp") {
                $usersList = User::where('id_posisi_jabatan', '0')->where('level', 'officer')->get();
            } else {
                $usersList = User::where('id_posisi_jabatan', $request->jabatan)->where('level', 'officer')->get();
            }
            return DataTables::of($usersList)
                ->addIndexColumn()
                ->addColumn('nama', function ($usersList) {
                    return '<span class="capitalize">' .  strlen($usersList->nama) > 20 ? substr($usersList->nama, 0, 20) . '...' : $usersList->nama . '</span>';
                })
                ->addColumn('email', function ($usersList) {
                    return '<span>' .  strlen($usersList->email) > 20 ? substr($usersList->email, 0, 20) . '...' : $usersList->email . '</span>';
                })
                ->addColumn('nomor_telpon', function ($usersList) {
                    return currencyPhone($usersList->nomor_telpon);
                })
                ->addColumn('akses', function ($usersList) {
                    return '<span class="capitalize badge badge-success text-center ">' . $usersList->level . '</span>';
                })
                ->addColumn('action', function ($usersList) {
                    return view('admin.elements.create-button')->with('usersList', $usersList);
                })
                ->rawColumns(['akses', 'email', 'nama', 'phone'])
                ->toJson();
        } else {
            $usersList = $this->officerRepository->getUserbyOfficer();
            return DataTables::of($usersList)
                ->addIndexColumn()
                ->addColumn('nama', function ($usersList) {
                    return '<span class="capitalize">' .  strlen($usersList->nama) > 20 ? substr($usersList->nama, 0, 20) . '...' : $usersList->nama . '</span>';
                })
                ->addColumn('email', function ($usersList) {
                    return '<span>' .  strlen($usersList->email) > 20 ? substr($usersList->email, 0, 20) . '...' : $usersList->email . '</span>';
                })
                ->addColumn('nomor_telpon', function ($usersList) {
                    return currencyPhone($usersList->nomor_telpon);
                })
                ->addColumn('akses', function ($usersList) {
                    return '<span class="capitalize badge badge-success text-center ">' . $usersList->level . '</span>';
                })
                ->addColumn('action', function ($usersList) {
                    return view('admin.elements.create-button')->with('usersList', $usersList);
                })
                ->rawColumns(['akses', 'email', 'nama', 'phone'])
                ->toJson();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('admin');

        $posisiJabatanList = PosisiJabatan::get();

        return view('admin.officers.officer-create', [
            'title' => 'Create Officer',
            'active' => 'Officer',
            'active1' => 'users',
            'posisiJabatanList' => $posisiJabatanList,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $this->authorize('admin');

        $this->officerRepository->store($request);;
        return redirect()->intended('/officer')->with('success', 'Berhasil menambah data Officer.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Mengacak id agar menampilkan pesan acak untuk menjaga url
        $encryptId = Crypt::decryptString($id);
        $detailOfficer = $this->officerRepository->show($encryptId);
        return view('admin.officers.officer-detail', [
            'title' => 'Detail Officer',
            'active' => 'Officer',
            'active1' => 'users',
            'detailDataOfficer' => $detailOfficer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('admin');

        //Mengacak id agar menampilkan pesan acak untuk menjaga url
        $encryptId = Crypt::decryptString($id);
        $editData = $this->officerRepository->edit($encryptId);
        $posisiJabatanList = PosisiJabatan::get();


        return view('admin.officers.officer-edit', [
            'title' => 'Edit Officer',
            'active' => 'Officer',
            'active1' => 'users',
            'editDataOfficer' => $editData,
            'posisiJabatanList' => $posisiJabatanList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $this->authorize('admin');

        $this->officerRepository->update($request->id_user, $request);
        return redirect()->intended('/officer')->with('success', 'Berhasil mengubah data Officer.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('admin');

        $encryptId = Crypt::decryptString($id);
        if (Auth::user()->id_user != $encryptId) {
            $this->officerRepository->destroy($encryptId);
            return redirect()->intended('/officer')->with('success', 'Berhasil menghapus data Officer.');
        } else {
            return redirect()->intended('/officer')->with('warning', 'Tidak bisa menghapus data Officer ini.');
        }
    }

    public function deleteImageFromUser($id)
    {
        $this->authorize('admin');

        $this->officerRepository->deleteImageFromUser($id);
        return back()->with('success', 'Berhasil menghapus foto profil Officer.');
    }
}
