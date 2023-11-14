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
        return $this->surat->get();
    }

    public function store($data)
    {
        $nama_dokumen = time() . '.' . $data->scan_dokumen->extension();
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
        $this->surat->where('id_surat', $id)->first();
    }
    public function edit($id)
    {
        $this->surat->where('id_surat', $id)->first();
    }

    public function update($id, $data)
    {
        $surat = $this->surat->where('id_surat', $data->id_surat)->first();
        if ($surat->scan_dokumen != null) {
            $documentPath = public_path('document_save/') . $surat->scan_dokumen;
            if (file_exists($documentPath)) {
                unlink($documentPath);
            }
        }
        $nama_dokumen = time() . '.' . $data->scan_dokumen->extension();
        $data->scan_dokumen->move(public_path('document_save'), $nama_dokumen);
        $this->surat->update([
            'nomor_surat' => $data->nomor_surat,
            'tanggal_surat' => $data->tanggal_surat,
            'isi_surat' => $data->isi_surat,
            'pengirim_surat' => $data->pengirim_surat,
            'id_user' => $data->id_user,
            'scan_dokumen' => $nama_dokumen,
        ]);
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
}
