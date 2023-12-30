<?php

namespace App\Exports;

use App\Models\SuratKeluar;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SuratKeluarExport implements FromCollection, WithMapping, WithHeadings
{

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return SuratKeluar::get();
    }
    public function query()
    {
        return SuratKeluar::query();
    }
    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No',
            'id_klasifikasi',
            'jumlah_lampiran',
            'nomor_surat_keluar',
            'tanggal_surat_keluar',
            'id_user',
            'tujuan_surat_keluar',
            'sifat_surat_keluar',
            'perihal',
            'isi_surat',
            'tembusan',
            'created_at',
            'updated_at',
        ];
    }

    /**
     * @param mixed $row
     * @return array
     */
    public function map($row): array
    {
        static $rowNumber = 0;
        $rowNumber++;
        return [
            $rowNumber,
            $row->id_klasifikasi,
            $row->jumlah_lampiran,
            $row->nomor_surat_keluar,
            $row->tanggal_surat_keluar,
            $row->user->id_user,
            $row->tujuan_surat_keluar,
            $row->sifat_surat_keluar,
            $row->perihal,
            $row->isi_surat,
            $row->tembusan,
            $row->created_at,
            $row->updated_at,
        ];
    }
}
