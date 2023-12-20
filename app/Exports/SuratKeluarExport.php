<?php

namespace App\Exports;

use App\Models\SuratKeluar;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SuratKeluarExport implements FromCollection, WithMapping, WithHeadings
{
    protected $data;

    public function __construct(SuratKeluar $data)
    {
        $this->data = $data;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->data;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No',
            'id_klasifikasi',
            'nomor_surat_keluar',
            'tanggal_surat_keluar',
            'id_user',
            'id_instansi',
            'id_instansi_penerima',
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
            $row->nomor_surat_keluar,
            $row->tanggal_surat_keluar,
            $row->user->id_user,
            $row->instansi->nama_instansi,
            $row->instansiPenerima->nama_instansi,
            $row->perihal,
            $row->isi_surat,
            $row->tembusan,
            $row->created_at,
            $row->updated_at,
        ];
    }
}
