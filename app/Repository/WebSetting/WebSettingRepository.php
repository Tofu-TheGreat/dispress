<?php

namespace App\Repository\WebSetting;

interface WebSettingRepository
{
    public function store($data);
    public function update($data, $id);
}
