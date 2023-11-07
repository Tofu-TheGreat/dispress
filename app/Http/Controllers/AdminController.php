<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repository\Admin\AdminRepository;
use Yajra\DataTables\Contracts\DataTable;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    private $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usersList = $this->adminRepository->getUserbyAdmin();
        return view('admin.admin-data', [
            'title' => 'Admin',
            'active' => 'Admin',
            'active1' => 'users',
            'users' => $usersList,
        ]);
    }

    public function indexAdmin()
    {
        $usersList = $this->adminRepository->getUserbyAdmin();

        return DataTables::of($usersList)
            ->addIndexColumn()
            ->addColumn('action', function ($usersList) {
                return view('admin.elements.create_button')->with('usersList', $usersList);
            })
            ->toJson();
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
    public function store(AdminRequest $request)
    {
        $data = $this->adminRepository->store($request);;
        return redirect()->intended('/admin')->with('success', 'Berhasil Menambah data Admin');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
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
    public function update(AdminRequest $request, $id)
    {
        $this->adminRepository->update($request->id_user, $request);
        return redirect()->intended('/admin')->with('success', 'Berhasil Mengedit data Admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->adminRepository->destroy($id);
        return back();
    }

    public function deleteImageFromUser($id)
    {
        $this->adminRepository->deleteImageFromUser($id);
        return back();
    }
}
