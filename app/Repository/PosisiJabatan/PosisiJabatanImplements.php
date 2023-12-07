<?php

namespace App\Repository\PosisiJabatan;

use App\Models\PosisiJabatan;

class PosisiJabatanImplements implements PosisiJabatanRepository
{
    private $posisijabatan;
    public function __construct(PosisiJabatan $posisiJabatan)
    {
        $this->posisijabatan = $posisiJabatan;
    }
    public function index()
    {
        return $this->posisijabatan->get();
    }
    public function store($data)
    {
        $query = $this->posisijabatan->create([
            'nama_posisi_jabatan' => $data->nama_posisi_jabatan,
            'deskripsi_jabatan' => $data->deskripsi_jabatan,
            'tingkat_jabatan' => $data->tingkat_jabatan,
        ]);

        return $query;
    }
    public function show($id)
    {
        return $this->posisijabatan->where('id_posisi_jabatan', $id)->first();
    }
    public function edit($id)
    {
        return $this->posisijabatan->where('id_posisi_jabatan', $id)->first();
    }
    public function update($id, $data)
    {
        $query = $this->posisijabatan->where('id_posisi_jabatan', $id)->update([
            'nama_posisi_jabatan' => $data->nama_posisi_jabatan,
            'deskripsi_jabatan' => $data->deskripsi_jabatan,
            'tingkat_jabatan' => $data->tingkat_jabatan,
        ]);

        return $query;
    }
    public function destroy($id)
    {
        $this->posisijabatan->where('id_posisi_jabatan', $id)->delete();
    }
}
