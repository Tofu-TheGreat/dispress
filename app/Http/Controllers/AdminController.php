<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repository\Admin\AdminRepository;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    private $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        // Menetapkan objek AdminRepository yang diberikan ke properti $adminRepository
        //Semua function yang dipakai berada di App/Repository/Admin/AdminImplement.php
        $this->adminRepository = $adminRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil daftar pengguna dari AdminRepository
        $usersList = $this->adminRepository->getUserbyAdmin();
        return view('admin.admin-data', [
            'title' => 'Admin',
            'active' => 'Admin',
            'active1' => 'users',
            'users' => $usersList,
        ]);
    }

    public function indexAdmin(Request $request)
    {
        if ($request->jabatan) {
            // Memeriksa nilai 'jabatan' dan menyesuaikan query yang dikirimkan ajax
            if ($request->jabatan == "kp") {
                $usersList = User::where('jabatan', '0')->where('level', 'admin')->get();
            } else {
                $usersList = User::where('jabatan', $request->jabatan)->where('level', 'admin')->get();
            }
            return DataTables::of($usersList)
                ->addIndexColumn()
                ->addColumn('nama', function ($usersList) {
                    return '<span class="capitalize">' . $usersList->nama . '</span>';
                })
                ->addColumn('nomor_telpon', function ($usersList) {
                    return currencyPhone($usersList->nomor_telpon);
                })
                ->addColumn('akses', function ($usersList) {
                    return '<span class="capitalize badge badge-success text-center ">' . $usersList->level . '</span>';
                })
                ->addColumn('action', function ($usersList) {
                    return view('admin.elements.create_button')->with('usersList', $usersList);
                })
                ->rawColumns(['akses', 'nama', 'phone'])
                ->toJson();
        } else {
            $usersList = $this->adminRepository->getUserbyAdmin();
            return DataTables::of($usersList)
                ->addIndexColumn()
                ->addColumn('nama', function ($usersList) {
                    return '<span class="capitalize">' . $usersList->nama . '</span>';
                })
                ->addColumn('nomor_telpon', function ($usersList) {
                    return currencyPhone($usersList->nomor_telpon);
                })
                ->addColumn('akses', function ($usersList) {
                    return '<span class="capitalize badge badge-success text-center ">' . $usersList->level . '</span>';
                })
                ->addColumn('action', function ($usersList) {
                    return view('admin.elements.create_button')->with('usersList', $usersList);
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
        return view('admin.admin-create', [
            'title' => 'Create Admin',
            'active' => 'Admin',
            'active1' => 'users',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $this->adminRepository->store($request);;
        return redirect()->intended('/admin')->with('success', 'Berhasil menambah data Admin!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //Mengacak id agar menampilkan pesan acak untuk menjaga url
        $encryptId = Crypt::decryptString($id);
        $detailAdmin = $this->adminRepository->show($encryptId);
        return view('admin.admin-detail', [
            'title' => 'Detail Admin',
            'active' => 'Admin',
            'active1' => 'users',
            'detailDataAdmin' => $detailAdmin
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Mengacak id agar menampilkan pesan acak untuk menjaga url
        $encryptId = Crypt::decryptString($id);
        $editData = $this->adminRepository->edit($encryptId);
        return view('admin.admin-edit', [
            'title' => 'Edit Admin',
            'active' => 'Admin',
            'active1' => 'users',
            'editDataAdmin' => $editData
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, $id)
    {
        $this->adminRepository->update($request->id_user, $request);
        return redirect()->intended('/admin')->with('success', 'Berhasil meng-edit data Admin.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->adminRepository->destroy($id);
        return back()->with('success', 'Berhasil menghapus data Admin.');
    }

    public function deleteImageFromUser($id)
    {
        $this->adminRepository->deleteImageFromUser($id);
        return back()->with('success', 'Berhasil menghapus foto profil Admin.');
    }
}
