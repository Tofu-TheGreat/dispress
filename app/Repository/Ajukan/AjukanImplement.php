<?php

namespace App\Repository\Ajukan;

use App\Models\Ajukan;

class AjukanImplement implements AjukanRepository
{
    private $ajukan;
    public function __construct(Ajukan $ajukan)
    {
        $this->ajukan = $ajukan;
    }

    public function index()
    {
        return $this->ajukan->paginate(6);
    }
    public function store($data)
    {
        $this->ajukan->create([
            'id_klasifikasi' => $data->id_klasifikasi,
            'nomor_agenda' => $data->nomor_agenda,
            'id_surat' => $data->id_surat,
            'tanggal_terima' => $data->tanggal_terima,
            'tujuan_ajuan' => $data->tujuan_ajuan,
        ]);
    }
    public function show($id)
    {
        return $this->ajukan->where('id_ajukan', $id)->first();
    }
    public function edit($id)
    {
        return $this->ajukan->where('id_ajukan', $id)->first();
    }
    public function update($id, $data)
    {
        $this->ajukan->where('id_ajukan', $id)->update([
            'id_klasifikasi' => $data->id_klasifikasi,
            'nomor_agenda' => $data->nomor_agenda,
            'id_surat' => $data->id_surat,
            'tanggal_terima' => $data->tanggal_terima,
            'tujuan_ajuan' => $data->tujuan_ajuan,
        ]);
    }
    public function destroy($id)
    {
        $this->ajukan->where('id_ajukan', $id)->delete();
    }
    public function filterData($data)
    {
        $query = $this->ajukan->query();

        if (isset($data->id_klasifikasi) && ($data->id_klasifikasi != null)) {
            $query->where('id_klasifikasi', $data->id_klasifikasi);
        }
        if (isset($data->id_surat) && ($data->id_surat != null)) {
            $query->where('id_surat', $data->id_surat);
        }
        if (
            isset($data->tanggal_surat_awal) &&
            ($data->tanggal_surat_awal != null) &&
            isset($data->tanggal_surat_terakhir) &&
            ($data->tanggal_surat_terakhir != null)
        ) {
            $query->whereBetween('tanggal_terima', [$data->tanggal_surat_awal, $data->tanggal_surat_terakhir]);
        }


        return $query->paginate(6);
    }
    public function search($data)
    {
        $search = $this->ajukan->where('nomor_agenda', 'like', "%" . $data->search . "%")
            ->orWhere(function ($query) use ($data) {
                $query->where('tanggal_terima', 'like', "%" . $data->search . "%")
                    ->orWhereRaw("DATE_FORMAT(tanggal_terima, '%M') LIKE ?", ["%" . $data->search . "%"]);
            })
            ->orWhereHas('surat', function ($query) use ($data) {
                $query->where('nomor_surat', 'like', "%" . $data->search . "%");
            })
            ->orWhereHas('klasifikasi', function ($query) use ($data) {
                $query->where('nomor_klasifikasi', 'like', "%" . $data->search . "%");
            });
        // ->orWhereHas('user', function ($query) use ($data) {
        //     $query->where('nama', 'like', "%" . $data->search . "%");
        // })
        // ->orWhere('isi_surat', 'like', "%" . $data->search . "%");
        return $search->paginate(6);
    }
}
