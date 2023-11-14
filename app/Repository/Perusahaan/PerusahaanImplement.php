<?php

namespace App\Repository\Perusahaan;

use App\Models\Perusahaan;

class PerusahaanImplement implements PerusahaanRepository
{
    private $perusahaan;
    public function __construct(Perusahaan $perusahaan)
    {
        $this->perusahaan = $perusahaan;
    }
    public function store($data)
    {
        $this->perusahaan->create([
            'nama_perusahaan' => $data->nama_perusahaan,
            'alamat_perusahaan' => $data->alamat_perusahaan,
            'nomor_telepon' => $data->nomor_telepon,
        ]);
    }
    public function show(string $id)
    {
        $this->perusahaan->where('id_perusahaan', $id)->first();
    }
    public function edit(string $id)
    {
        $this->perusahaan->where('id_perusahaan', $id)->first();
    }
    public function update($data, string $id)
    {
        $this->perusahaan->where('id_perusahaan', $id)->update([
            'nama_perusahaan' => $data->nama_perusahaan,
            'alamat_perusahaan' => $data->alamat_perusahaan,
            'nomor_telepon' => $data->nomor_telepon,
        ]);
    }
    public function destroy(string $id)
    {
        $this->perusahaan->where('id_perusahaan', $id)->delete();
    }
}
