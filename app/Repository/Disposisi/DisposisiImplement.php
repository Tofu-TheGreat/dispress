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
        $paginatedData = $this->disposisi->paginate(6);
        $paginatedData->getCollection()->transform(function ($data) {
            $data->sifat_disposisi = convertDisposisiField($data->sifat_disposisi, 'sifat');
            $data->status_disposisi = convertDisposisiField($data->status_disposisi, 'status');
            $data->tujuan_disposisi = convertDisposisiField($data->tujuan_disposisi, 'tujuan');
            return $data;
        });

        return $paginatedData;
    }

    public function store($data)
    {
        $this->disposisi->create([
            'id_surat' => $data->id_surat,
            'tanggal_disposisi' => $data->tanggal_disposisi,
            'catatan_disposisi' => $data->catatan_disposisi,
            'status_disposisi' => $data->status_disposisi,
            'sifat_disposisi' => $data->sifat_disposisi,
            'id_user' => $data->id_user,
            'tujuan_disposisi' => $data->tujuan_disposisi,
        ]);
    }
    public function show($id)
    {
        $data = $this->disposisi->where('id_disposisi', $id)->first();

        $data->sifat_disposisi = convertDisposisiField($data->sifat_disposisi, 'sifat');
        $data->status_disposisi = convertDisposisiField($data->status_disposisi, 'status');
        $data->tujuan_disposisi = convertDisposisiField($data->tujuan_disposisi, 'tujuan');

        return $data;
    }

    public function edit($id)
    {
        return $this->disposisi->where('id_disposisi', $id)->first();
    }
    public function update($id, $data)
    {
        $this->disposisi->where('id_disposisi', $id)->update([
            'id_surat' => $data->id_surat,
            'tanggal_disposisi' => $data->tanggal_disposisi,
            'catatan_disposisi' => $data->catatan_disposisi,
            'status_disposisi' => $data->status_disposisi,
            'sifat_disposisi' => $data->sifat_disposisi,
            'id_user' => $data->id_user,
            'tujuan_disposisi' => $data->tujuan_disposisi,
        ]);
    }
    public function destroy($id)
    {
        $this->disposisi->where('id_disposisi', $id)->delete();
    }
    public function filterData($data)
    {
        $query = $this->disposisi->query();

        if (isset($data->id_user) && ($data->id_user != null)) {
            $query->where('id_user', $data->id_user);
        }
        if (isset($data->tujuan_disposisi) && ($data->tujuan_disposisi != null)) {
            $query->where('tujuan_disposisi', $data->tujuan_disposisi);
        }
        if (isset($data->sifat_disposisi) && ($data->sifat_disposisi != null)) {
            $query->where('sifat_disposisi', $data->sifat_disposisi);
        }
        if (isset($data->status_disposisi) && ($data->status_disposisi != null)) {
            $query->where('status_disposisi', $data->status_disposisi);
        }
        if (
            isset($data->tanggal_surat_awal) &&
            ($data->tanggal_surat_awal != null) &&
            isset($data->tanggal_surat_terakhir) &&
            ($data->tanggal_surat_terakhir != null)
        ) {
            $query->whereBetween('tanggal_surat', [$data->tanggal_surat_awal, $data->tanggal_surat_terakhir]);
        }

        $result = $query->paginate(6);

        $result->getCollection()->transform(function ($item) {
            $item->sifat_disposisi = convertDisposisiField($item->sifat_disposisi, 'sifat');
            $item->status_disposisi = convertDisposisiField($item->status_disposisi, 'status');
            $item->tujuan_disposisi = convertDisposisiField($item->tujuan_disposisi, 'tujuan');
            return $item;
        });

        return $result;
    }
}
