<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repository\Officer\OfficerRepository;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;


class OfficerController extends Controller
{
    private $officerRepository;

    public function __construct(OfficerRepository $officerRepository)
    {
        $this->officerRepository = $officerRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usersList = $this->officerRepository->getUserbyOfficer();
        return view('admin.officers.officer-data', [
            'title' => 'Officer',
            'active' => 'Officer',
            'active1' => 'users',
            'users' => $usersList,
        ]);
    }

    public function indexAdmin(Request $request)
    {
        if ($request->jabatan) {
            if ($request->jabatan == "kp") {
                $usersList = User::where('jabatan', '0')->where('level', 'officer')->get();
            } else {
                $usersList = User::where('jabatan', $request->jabatan)->where('level', 'officer')->get();
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
            $usersList = $this->officerRepository->getUserbyOfficer();
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
        return view('admin.officers.officer-create', [
            'title' => 'Create Officer',
            'active' => 'Officer',
            'active1' => 'users',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $this->officerRepository->store($request);;
        return redirect()->intended('/officer')->with('success', 'Berhasil menambah data Officer.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $encryptId = Crypt::decryptString($id);
        $detailAdmin = $this->officerRepository->show($encryptId);
        return view('admin.officers.officer-detail', [
            'title' => 'Detail Admin',
            'active' => 'Officer',
            'active1' => 'users',
            'detailDataAdmin' => $detailAdmin
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $encryptId = Crypt::decryptString($id);
        $editData = $this->officerRepository->edit($encryptId);
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
    public function update(Request $request, string $id)
    {
        $this->officerRepository->update($request->id_user, $request);
        // return redirect()->intended('/admin')->with('success', 'Berhasil Mengedit data Admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->officerRepository->destroy($id);
        // return back()->with('success', 'Berhasil Menghapus data Admin');
    }

    public function deleteImageFromUser($id)
    {
        $this->officerRepository->deleteImageFromUser($id);
        // return back()->with('success', 'Berhasil Menghapus foto profil Admin');
    }
}
