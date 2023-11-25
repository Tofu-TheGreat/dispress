<?php

namespace app\Repository\Disposisi;

use App\Models\Disposisi;
use App\Repository\Disposisi\DisposisiRepository;

class DisposisiImplement implements DisposisiRepository
{
    public $disposisi;

    public function __construct(Disposisi $disposisi)
    {
        $this->disposisi = $disposisi;
    }

    public function index()
    {
        return $this->disposisi->paginate(6);
    }

    public function store($data)
    {
        $this->disposisi->create([
            'id_surat' => $data->id_surat,
            'tanggal_disposisi' => $data->tanggal_disposisi,
            'catatan_disposisi' => $data->catatan_disposisi,
            'status_disposisi' => $data->status_disposisi,
            'sifat_disposisi' => $data->sifat_diposisi,
            'id_user' => $data->id_user,
            'tujuan_disposisi' => $data->tujuan_diposisi,
        ]);
    }
    public function show($id)
    {
        return $this->disposisi->where('id_disposisi', $id)->first();
    }
    public function edit($id)
    {
        return $this->disposisi->where('id_disposisi', $id)->first();
    }
    public function update($id, $data)
    {
        $this->disposisi->update([
            'id_surat' => $data->id_surat,
            'tanggal_disposisi' => $data->tanggal_disposisi,
            'catatan_disposisi' => $data->catatan_disposisi,
            'status_disposisi' => $data->status_disposisi,
            'sifat_disposisi' => $data->sifat_diposisi,
            'id_user' => $data->id_user,
            'tujuan_disposisi' => $data->tujuan_diposisi,
        ]);
    }
    public function destroy($id)
    {
        $this->disposisi->where('id_disposisi', $id)->delete();
    }
}
