<?php

namespace App\Exports;

use App\Models\Disposisi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DisposisiExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Disposisi::get();
    }
    public function headings(): array
    {
        return [
            'No',
            'nomor_agenda',
            'catatan_disposisi',
            'status_disposisi',
            'sifat_disposisi',
            'pengirim_disposisi',
            'tanggal_disposisi',
            'penerima disposisi (jabatan)',
            'penerima disposisi (personal)',
            'created_at',
            'updated_at',
        ];
    }
    public function query()
    {
        return Disposisi::query();
    }

    public function map($row): array
    {
        static $rowNumber = 0;
        $rowNumber++;
        return [
            $rowNumber,
            $row->pengajuan->nomor_agenda,
            $row->catatan_disposisi,
            convertDisposisiField($row->status_disposisi, 'status'),
            convertDisposisiField($row->sifat_disposisi, 'sifat'),
            $row->user->nama,
            $row->tanggal_disposisi,
            $this->nullConvertJabatan($row),
            $this->nullConvertPenerima($row),
            $row->created_at,
            $row->updated_at,
        ];
    }

    public function nullConvertJabatan($data)
    {
        if ($data->id_posisi_jabatan != null) {
            return $data->posisiJabatan->nama_posisi_jabatan;
        } else {
            return "tidak ada";
        }
    }
    public function nullConvertPenerima($data)
    {
        if ($data->id_penerima != null) {
            return $data->penerima->nama;
        } else {
            return "tidak ada";
        }
    }
}
