<?php

namespace App\Repository\Instansi;

use App\Models\Instansi;
use App\Repository\Instansi\InstansiRepository;

class InstansiImplement implements InstansiRepository
{
    private $instansi;
    public function __construct(Instansi $instansi)
    {
        $this->instansi = $instansi;
    }
    public function index()
    {
        return $this->instansi->paginate(8);
    }
    public function store($data)
    {
        $this->instansi->create([
            'nama_instansi' => $data->nama_instansi,
            'alamat_instansi' => $data->alamat_instansi,
            'nomor_telpon' => $data->nomor_telpon,
        ]);
    }
    public function show(string $id)
    {
        $this->instansi->where('id_instansi', $id)->first();
    }
    public function edit(string $id)
    {
        $this->instansi->where('id_instansi', $id)->first();
    }
    public function update($data, string $id)
    {
        $this->instansi->where('id_instansi', $id)->update([
            'nama_instansi' => $data->nama_instansi,
            'alamat_instansi' => $data->alamat_instansi,
            'nomor_telpon' => $data->nomor_telpon,
        ]);
    }
    public function destroy(string $id)
    {
        $this->instansi->where('id_instansi', $id)->delete();
    }

    public function search($data)
    {
        $search = $this->instansi->where('nama_instansi', 'like', "%" . $data->search . "%")
            ->orWhere('alamat_instansi', 'like', "%" . $data->search . "%")
            ->orWhere('nomor_telpon', 'like', "%" . $data->search . "%");

        return $search->paginate(6);
    }
}
