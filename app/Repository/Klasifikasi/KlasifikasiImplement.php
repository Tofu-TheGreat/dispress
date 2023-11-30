<?php

namespace App\Repository\Klasifikasi;

use App\Models\Klasifikasi;

class KlasifikasiImplement implements KlasifikasiRepository
{
    private $klasifikasi;

    public function __construct(Klasifikasi $klasifikasi)
    {
        $this->klasifikasi = $klasifikasi;
    }

    public function index()
    {
        return $this->klasifikasi->get();
    }
    public function store($data)
    {
        $this->klasifikasi->create([
            'nomor_klasifikasi' => $data->nomor_klasifikasi,
            'nama_klasifikasi' => $data->nama_klasifikasi,
        ]);
    }
    public function show(string $id)
    {
        return $this->klasifikasi->where('id_klasifikasi', $id)->first();
    }
    public function edit(string $id)
    {
        return $this->klasifikasi->where('id_klasifikasi', $id)->first();
    }
    public function update($data, string $id)
    {
        $this->klasifikasi->where('id_klasifikasi', $id)->update([
            'nomor_klasifikasi' => $data->nomor_klasifikasi,
            'nama_klasifikasi' => $data->nama_klasifikasi,
        ]);
    }
    public function destroy(string $id)
    {
        $this->klasifikasi->where('id_klasifikasi', $id)->delete();
    }
}
