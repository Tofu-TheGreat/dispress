<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Surat;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SuratExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Surat::get();
    }
    public function headings(): array
    {
        return [
            'No',
            'id_surat',
            'nomor_surat',
            'tanggal_surat',
            'isi_surat',
            'id_instansi',
            'id_user',
            'scan_dokumen',
            "created_at",
            "updated_at",
        ];
    }
    public function query()
    {
        return Surat::query();
    }

    public function map($row): array
    {
        static $rowNumber = 0;
        $rowNumber++;
        return [
            $rowNumber,
            $row->id_surat,
            $row->nomor_surat,
            $row->tanggal_surat,
            $row->isi_surat,
            $row->instansi->nama_instansi,
            $row->user->nama,
            $row->scan_dokumen,
            $row->created_at,
            $row->updated_at,
        ];
    }
}
