<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PosisiJabatan;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;
use App\Repository\Staff\StaffRepository;

class StaffController extends Controller
{
    private $staffRepository;

    public function __construct(StaffRepository $staffRepository)
    {
        // Menetapkan objek StaffRepository yang diberikan ke properti $staffRepository
        //Semua function yang dipakai berada di App/Repository/Admin/AdminImplement.php
        $this->staffRepository = $staffRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usersList = $this->staffRepository->getUserbyStaff();
        $posisiJabatanList = PosisiJabatan::get();

        return view('admin.staff.staff-data', [
            'title' => 'Staff',
            'active' => 'Staff',
            'active1' => 'users',
            'users' => $usersList,
            'posisiJabatanList' => $posisiJabatanList,

        ]);
    }

    public function indexAdmin(Request $request)
    {
        if ($request->jabatan) {
            if ($request->jabatan == "kp") {
                $usersList = User::where('id_posisi_jabatan', '0')->where('level', 'staff')->get();
            } else {
                $usersList = User::where('id_posisi_jabatan', $request->jabatan)->where('level', 'staff')->get();
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
                ->rawColumns(['akses', 'nama', 'phone'])
                ->toJson();
        } else {
            $usersList = $this->staffRepository->getUserbyStaff();
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
                ->rawColumns(['akses', 'nama', 'phone'])
                ->toJson();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posisiJabatanList = PosisiJabatan::get();

        return view('admin.staff.staff-create', [
            'title' => 'Create Staff',
            'active' => 'Staff',
            'active1' => 'users',
            'posisiJabatanList' => $posisiJabatanList,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $this->staffRepository->store($request);;
        return redirect()->intended('/staff')->with('success', 'Berhasil menambah data Staff');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $encryptId = Crypt::decryptString($id);
        $detailStaff = $this->staffRepository->show($encryptId);
        return view('admin.staff.staff-detail', [
            'title' => 'Detail Staff',
            'active' => 'Staff',
            'active1' => 'users',
            'detailDataStaff' => $detailStaff
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Mengacak id agar menampilkan pesan acak untuk menjaga url
        $encryptId = Crypt::decryptString($id);
        $editData = $this->staffRepository->edit($encryptId);
        $posisiJabatanList = PosisiJabatan::get();

        return view('admin.staff.staff-edit', [
            'title' => 'Edit Staff',
            'active' => 'Staff',
            'active1' => 'users',
            'editDataStaff' => $editData,
            'posisiJabatanList' => $posisiJabatanList,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        //Mengacak id agar menampilkan pesan acak untuk menjaga url
        $this->staffRepository->update($request->id_user, $request);
        return redirect()->intended('/staff')->with('success', 'Berhasil meng-edit data Staff');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $encryptId = Crypt::decryptString($id);
        if (Auth::user()->id_user != $encryptId) {
            $this->staffRepository->destroy($encryptId);
            return redirect()->intended('/staff')->with('success', 'Berhasil menghapus data Staff');
        } else {
            return redirect()->intended('/staff')->with('warning', 'Tidak bisa menghapus data Staff ini.');
        }
    }

    public function deleteImageFromUser($id)
    {
        $this->staffRepository->deleteImageFromUser($id);
        return back()->with('success', 'Berhasil menghapus foto profil Staff');
    }
}
