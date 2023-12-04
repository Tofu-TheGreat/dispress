<?php

namespace App\Repository\Ajukan;

use App\Models\Pengajuan;

class PengajuanImplement implements PengajuanRepository
{
    private $pengajuan;
    public function __construct(Pengajuan $pengajuan)
    {
        $this->pengajuan = $pengajuan;
    }

    public function index()
    {
        return $this->pengajuan->paginate(6);
    }
    public function store($data)
    {
        $this->pengajuan->create([
            'id_klasifikasi' => $data->id_klasifikasi,
            'nomor_agenda' => $data->nomor_agenda,
            'id_surat' => $data->id_surat,
            'tanggal_terima' => $data->tanggal_terima,
            'catatan_pengajuan' => $data->catatan_pengajuan,
            'id_user' => $data->id_user,
            'tujuan_pengajuan' => $data->tujuan_pengajuan,
        ]);
    }
    public function show($id)
    {
        $data = $this->pengajuan->where('id_pengajuan', $id)->first();

        $data->tujuan_pengajuan = jabatanConvert($data->tujuan_pengajuan, 'jabatan');
        $data->status_pengajuan = statusPengajuanConvert($data->status_pengajuan, 'status_pengajuan');

        return $data;
    }
    public function edit($id)
    {
        $data = $this->pengajuan->where('id_pengajuan', $id)->first();

        $data->tujuan_pengajuan = jabatanConvert($data->tujuan_pengajuan, 'jabatan');
        $data->status_pengajuan = statusPengajuanConvert($data->status_pengajuan, 'status_pengajuan');

        return $data;
    }
    public function update($id, $data)
    {
        $this->pengajuan->where('id_pengajuan', $id)->update([
            'id_klasifikasi' => $data->id_klasifikasi,
            'nomor_agenda' => $data->nomor_agenda,
            'id_surat' => $data->id_surat,
            'tanggal_terima' => $data->tanggal_terima,
            'status_pengajuan' => $data->status_pengajuan,
            'catatan_pengajuan' => $data->catatan_pengajuan,
            'id_user' => $data->id_user,
            'tujuan_pengajuan' => $data->tujuan_pengajuan,
        ]);
    }
    public function destroy($id)
    {
        $this->pengajuan->where('id_pengajuan', $id)->delete();
    }
    public function filterData($data)
    {
        $query = $this->pengajuan->query();

        if (isset($data->id_klasifikasi) && ($data->id_klasifikasi != null)) {
            $query->where('id_klasifikasi', $data->id_klasifikasi);
        }
        if (isset($data->id_surat) && ($data->id_surat != null)) {
            $query->where('id_surat', $data->id_surat);
        }
        if (isset($data->status_pengajuan) && ($data->status_pengajuan != null)) {
            $query->where('status_pengajuan', $data->status_pengajuan);
        }
        if (isset($data->id_user) && ($data->id_user != null)) {
            $query->where('id_user', $data->id_user);
        }
        if (isset($data->tujuan_pengajuan) && ($data->tujuan_pengajuan != null)) {
            $query->where('tujuan_pengajuan', $data->tujuan_pengajuan);
        }
        if (
            isset($data->tanggal_pengajuan_awal) &&
            ($data->tanggal_pengajuan_awal != null) &&
            isset($data->tanggal_pengajuan_terakhir) &&
            ($data->tanggal_pengajuan_terakhir != null)
        ) {
            $query->whereBetween('tanggal_terima', [$data->tanggal_pengajuan_awal, $data->tanggal_pengajuan_terakhir]);
        }


        return $query->paginate(6);
    }
    public function search($data)
    {
        $search = $this->pengajuan->where('nomor_agenda', 'like', "%" . $data->search . "%")
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
