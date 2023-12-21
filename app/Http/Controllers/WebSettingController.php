<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebSettingRequest;
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
        return view('admin.pages.web-setting', [
            'title' => 'Web-setting',
            'active' => 'web-setting',
            'active1' => 'setting',
        ]);
    }
    public function store(WebSettingRequest $request)
    {
        $this->webSettingRepository->store($request);
    }
    public function update(WebSettingRequest $request, $id)
    {
        $this->webSettingRepository->update($request, $id);
    }
}
