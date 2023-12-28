<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebSettingRequest;
use App\Models\Instansi;
use App\Models\User;
use App\Repository\WebSetting\WebSettingRepository;
use Illuminate\Http\Request;

class WebSettingController extends Controller
{
    private $webSettingRepository;
    public function __construct(WebSettingRepository $webSettingRepository)
    {
        $this->webSettingRepository = $webSettingRepository;
    }
    public function index()
    {
        $this->authorize('admin');

        $dataWebSetting = $this->webSettingRepository->index();
        $instansiList = Instansi::get();
        $userList = User::get();

        return view('admin.pages.web-setting', [
            'title' => 'Web-setting',
            'active' => 'web-setting',
            'active1' => 'setting',
            'dataWebSetting' => $dataWebSetting[0],
            'instansiList' => $instansiList,
            'userList' => $userList,
        ]);
    }


    public function store(WebSettingRequest $request)
    {
        $this->authorize('admin');

        $this->webSettingRepository->store($request);
    }
    public function update(WebSettingRequest $request, $id)
    {
        $this->authorize('admin');

        $this->webSettingRepository->update($request, $id);
        return redirect()->intended('/web-setting')->with('success', 'Berhasil mengubah data.');
    }
    public function deleteImageWebSetting($id)
    {
        $this->authorize('admin');

        $this->webSettingRepository->deleteImageWebSetting($id);
        return back()->with('success', 'Berhasil menghapus logo instansi.');
    }
}
