<?php

namespace App\Repository\Surat;

use App\Models\Surat;

class SuratImplement implements SuratRepository
{
    private $surat;
    public function __construct(Surat $surat)
    {
        $this->surat = $surat;
    }

    public function index()
    {
        return $this->surat->with('perusahaan')->paginate(6);
    }

    public function store($data)
    {
        $nama_dokumen =  $data->scan_dokumen->getClientOriginalName();
        $data->scan_dokumen->move(public_path('document_save'), $nama_dokumen);
        $this->surat->create([
            'nomor_surat' => $data->nomor_surat,
            'tanggal_surat' => $data->tanggal_surat,
            'isi_surat' => $data->isi_surat,
            'id_perusahaan' => $data->id_perusahaan,
            'id_user' => $data->id_user,
            'scan_dokumen' => $nama_dokumen,
        ]);
    }

    public function show($id)
    {
        return $this->surat->with('user')->where('id_surat', $id)->first();
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
                'nomor_surat' => $data->nomor_surat,
                'tanggal_surat' => $data->tanggal_surat,
                'isi_surat' => $data->isi_surat,
                'id_perusahaan' => $data->id_perusahaan,
                'id_user' => $data->id_user,
                'scan_dokumen' => $nama_dokumen,
            ]);
        } else {
            $this->surat->where('id_surat', $id)->update([
                'nomor_surat' => $data->nomor_surat,
                'tanggal_surat' => $data->tanggal_surat,
                'isi_surat' => $data->isi_surat,
                'id_perusahaan' => $data->id_perusahaan,
                'id_user' => $data->id_user,
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

        if (isset($data->id_perusahaan) && ($data->id_perusahaan != null)) {
            $query->where('id_perusahaan', $data->id_perusahaan);
        }
        if (isset($data->id_user) && ($data->id_user != null)) {
            $query->where('id_user', $data->id_user);
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
}
