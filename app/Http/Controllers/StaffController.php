<?php

namespace App\Http\Controllers;

use App\Repository\Staff\StaffRepository;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class StaffController extends Controller
{
    private $staffRepository;

    public function __construct(StaffRepository $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usersList = $this->staffRepository->getUserbyStaff();
        // return view('admin.admin-data', [
        //     'title' => 'Admin',
        //     'active' => 'Admin',
        //     'active1' => 'users',
        //     'users' => $usersList,
        // ]);
    }

    public function indexAdmin(Request $request)
    {
        if ($request->jabatan) {
            if ($request->jabatan == "kp") {
                $usersList = User::where('jabatan', '0')->where('level', 'staff')->get();
            } else {
                $usersList = User::where('jabatan', $request->jabatan)->where('level', 'staff')->get();
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
            $usersList = $this->staffRepository->getUserbyStaff();
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
        // return view('admin.admin-create', [
        //     'title' => 'Create Admin',
        //     'active' => 'Admin',
        //     'active1' => 'users',
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $this->staffRepository->store($request);;
        // return redirect()->intended('/admin')->with('success', 'Berhasil Menambah data Admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $encryptId = Crypt::decryptString($id);
        $detailAdmin = $this->staffRepository->show($encryptId);
        // return view('admin.admin-detail', [
        //     'title' => 'Detail Admin',
        //     'active' => 'Admin',
        //     'active1' => 'users',
        //     'detailDataAdmin' => $detailAdmin
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $encryptId = Crypt::decryptString($id);
        $editData = $this->staffRepository->edit($encryptId);
        // return view('admin.admin-edit', [
        //     'title' => 'Edit Admin',
        //     'active' => 'Admin',
        //     'active1' => 'users',
        //     'editDataAdmin' => $editData
        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $this->staffRepository->update($request->id_user, $request);
        // return redirect()->intended('/admin')->with('success', 'Berhasil Mengedit data Admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->staffRepository->destroy($id);
        // return back()->with('success', 'Berhasil Menghapus data Admin');
    }

    public function deleteImageFromUser($id)
    {
        $this->staffRepository->deleteImageFromUser($id);
        // return back()->with('success', 'Berhasil Menghapus foto profil Admin');
    }
}
