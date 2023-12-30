<?php

namespace App\Repository\SuratKeluar;

use App\Models\SuratKeluar;

class SuratKeluarImplement implements SuratKeluarRepository
{
    private $suratkeluar;

    public function __construct(SuratKeluar $suratkeluar)
    {
        $this->suratkeluar = $suratkeluar;
    }

    public function index()
    {
        return $this->suratkeluar->paginate(6);
    }

    public function store($data)
    {
        $this->suratkeluar->create([
            'id_klasifikasi' => $data->id_klasifikasi,
            'jumlah_lampiran' => $data->jumlah_lampiran,
            'nomor_surat_keluar' => $data->nomor_surat_keluar,
            'tanggal_surat_keluar' => $data->tanggal_surat_keluar,
            'id_user' => $data->id_user,
            'tujuan_surat_keluar' => $data->tujuan_surat_keluar,
            'sifat_surat_keluar' => $data->sifat_surat_keluar,
            'perihal' => $data->perihal,
            'isi_surat' => $data->isi_surat,
            'tembusan' => $data->tembusan,
        ]);
    }

    public function show($id)
    {
        $data = $this->suratkeluar->where('id_surat_keluar', $id)->first();
        return $data;
    }

    public function edit($id)
    {
        return $this->suratkeluar->where('id_surat_keluar', $id)->first();
    }

    public function update($id, $data)
    {
        $this->suratkeluar->where('id_surat_keluar', $id)->update([
            'id_klasifikasi' => $data->id_klasifikasi,
            'jumlah_lampiran' => $data->jumlah_lampiran,
            'nomor_surat_keluar' => $data->nomor_surat_keluar,
            'tanggal_surat_keluar' => $data->tanggal_surat_keluar,
            'id_user' => $data->id_user,
            'tujuan_surat_keluar' => $data->tujuan_surat_keluar,
            'sifat_surat_keluar' => $data->sifat_surat_keluar,
            'perihal' => $data->perihal,
            'isi_surat' => $data->isi_surat,
            'tembusan' => $data->tembusan,
        ]);
    }

    public function destroy($id)
    {
        $this->suratkeluar->where('id_surat_keluar', $id)->delete();
    }
    public function filterData($data)
    {
        $query = $this->suratkeluar->query();

        if (isset($data->tujuan_surat_keluar) && ($data->tujuan_surat_keluar != null)) {
            $query->where('tujuan_surat_keluar', $data->tujuan_surat_keluar);
        }
        if (isset($data->id_user) && ($data->id_user != null)) {
            $query->where('id_user', $data->id_user);
        }
        if (isset($data->id_klasifikasi) && ($data->id_klasifikasi != null)) {
            $query->where('id_klasifikasi', $data->id_klasifikasi);
        }
        if (
            isset($data->tanggal_surat_awal) &&
            ($data->tanggal_surat_awal != null) &&
            isset($data->tanggal_surat_terakhir) &&
            ($data->tanggal_surat_terakhir != null)
        ) {
            $query->whereBetween('tanggal_surat_keluar', [$data->tanggal_surat_awal, $data->tanggal_surat_terakhir]);
        }


        return $query->paginate(6);
    }
    public function search($data)
    {
        $search = $this->suratkeluar->where('nomor_surat_keluar', 'like', "%" . $data->search . "%")
            ->orWhere(function ($query) use ($data) {
                $query->where('tanggal_surat_keluar', 'like', "%" . $data->search . "%")
                    ->orWhereRaw("DATE_FORMAT(tanggal_surat_keluar, '%M') LIKE ?", ["%" . $data->search . "%"]);
            })
            ->orWhereHas('user', function ($query) use ($data) {
                $query->where('nama', 'like', "%" . $data->search . "%");
            })
            ->orWhere('perihal', 'like', "%" . $data->search . "%")
            ->orWhere('tembusan', 'like', "%" . $data->search . "%")
            ->orWhere('sifat_surat_keluar', 'like', "%" . $data->search . "%")
            ->orWhere('isi_surat', 'like', "%" . $data->search . "%");
        return $search->paginate(6);
    }
}
