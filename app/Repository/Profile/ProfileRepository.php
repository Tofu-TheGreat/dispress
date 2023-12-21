<?php

namespace App\Repository\Profile;

interface ProfileRepository
{
    public function userGet();
    public function posisiJabatanGet();
    public function getSuratByUser();
    public function getPengajuanByUser();
    public function getDisposisiByUser();
    public function getDisposisiForUser();
    public function getSuratKeluarForUser();
    public function editProfile($data, $id);
    public function changePassword($data, $id);
}
