<?php

namespace App\Repository\Surat;

use App\Models\Surat;
use App\Models\Klasifikasi;
use App\Models\Pengajuan;

class SuratImplement implements SuratRepository
{
    private $surat;
    public function __construct(Surat $surat)
    {
        $this->surat = $surat;
    }

    public function index()
    {
        return $this->surat->with('instansi')->paginate(6);
    }

    public function store($data)
    {
        $nama_dokumen =  $data->scan_dokumen->getClientOriginalName();
        $data->scan_dokumen->move(public_path('document_save'), $nama_dokumen);
        $this->surat->create([
            'id_klasifikasi' => $data->id_klasifikasi,
            'nomor_surat' => $data->nomor_surat,
            'tanggal_surat' => $data->tanggal_surat,
            'isi_surat' => $data->isi_surat,
            'id_instansi' => $data->id_instansi,
            'id_user' => $data->id_user,
            'catatan_verifikasi' => $data->catatan_verifikasi,
            'scan_dokumen' => $nama_dokumen,
        ]);
    }

    public function show($id)
    {
        $data = $this->surat->with('user')->where('id_surat', $id)->first();

        $data->user->jabatan = jabatanConvert($data->user->jabatan, 'jabatan');
        return $data;
    }
    public function edit($id)
    {
        return $this->surat->where('id_surat', $id)->first();
    }

    public function update($id, $data)
    {
        if ($data->hasFile('scan_dokumen')) {
            $surat = $this->surat->where('id_surat', $data->id_surat)->first();
            if ($surat->scan_dokumen != null) {
                $documentPath = public_path('document_save/') . $surat->scan_dokumen;
                if (file_exists($documentPath)) {
                    unlink($documentPath);
                }
            }
            $nama_dokumen =  $data->scan_dokumen->getClientOriginalName();
            $data->scan_dokumen->move(public_path('document_save'), $nama_dokumen);
            $this->surat->where('id_surat', $id)->update([
                'id_klasifikasi' => $data->id_klasifikasi,
                'nomor_surat' => $data->nomor_surat,
                'tanggal_surat' => $data->tanggal_surat,
                'isi_surat' => $data->isi_surat,
                'id_instansi' => $data->id_instansi,
                'id_user' => $data->id_user,
                'status_verifikasi' => $data->status_verifikasi,
                'catatan_verifikasi' => $data->catatan_verifikasi,
                'scan_dokumen' => $nama_dokumen,
            ]);
        } else {
            $this->surat->where('id_surat', $id)->update([
                'id_klasifikasi' => $data->id_klasifikasi,
                'nomor_surat' => $data->nomor_surat,
                'tanggal_surat' => $data->tanggal_surat,
                'isi_surat' => $data->isi_surat,
                'id_instansi' => $data->id_instansi,
                'id_user' => $data->id_user,
                'status_verifikasi' => $data->status_verifikasi,
                'catatan_verifikasi' => $data->catatan_verifikasi,
            ]);
        }
    }

    public function destroy($id)
    {
        $surat = $this->surat->find($id);
        if ($surat->scan_dokumen != null) {
            $documentPath = public_path('document_save/') . $surat->scan_dokumen;
            if (file_exists($documentPath)) {
                unlink($documentPath);
            }
        }
        $this->surat->where('id_surat', $id)->delete();
    }

    public function filterData($data)
    {
        $query = $this->surat->query();

        if (isset($data->id_instansi) && ($data->id_instansi != null)) {
            $query->where('id_instansi', $data->id_instansi);
        }
        if (isset($data->id_user) && ($data->id_user != null)) {
            $query->where('id_user', $data->id_user);
        }
        if (isset($data->status_verifikasi) && ($data->status_verifikasi != null)) {
            $query->where('status_verifikasi', $data->status_verifikasi);
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
            $query->whereBetween('tanggal_surat', [$data->tanggal_surat_awal, $data->tanggal_surat_terakhir]);
        }


        return $query->paginate(6);
    }

    public function search($data)
    {
        $search = $this->surat->where('nomor_surat', 'like', "%" . $data->search . "%")
            ->orWhere(function ($query) use ($data) {
                $query->where('tanggal_surat', 'like', "%" . $data->search . "%")
                    ->orWhereRaw("DATE_FORMAT(tanggal_surat, '%M') LIKE ?", ["%" . $data->search . "%"]);
            })
            ->orWhereHas('instansi', function ($query) use ($data) {
                $query->where('nama_instansi', 'like', "%" . $data->search . "%");
            })
            ->orWhereHas('instansi', function ($query) use ($data) {
                $query->where('nomor_telpon', 'like', "%" . $data->search . "%");
            })
            ->orWhereHas('user', function ($query) use ($data) {
                $query->where('nama', 'like', "%" . $data->search . "%");
            })
            ->orWhere('isi_surat', 'like', "%" . $data->search . "%");
        return $search->paginate(6);
    }

    public function getPengajuan()
    {
        return Pengajuan::get();
    }
}
