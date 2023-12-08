<?php

namespace App\Exports;

use App\Models\Pengajuan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengajuanExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Pengajuan::get();
    }
    public function headings(): array
    {
        return [
            'No',
            'nomor_klasifikasi',
            'nomor_agenda',
            'nomor_surat',
            'tanggal_terima',
            'status_pengajuan',
            'catatan_pengajuan',
            'pengirim_ajuan',
            'created_at',
            'updated_at',
        ];
    }
    public function query()
    {
        return Pengajuan::query();
    }

    public function map($row): array
    {
        static $rowNumber = 0;
        $rowNumber++;
        return [
            $rowNumber,
            $row->klasifikasi->nomor_klasifikasi,
            $row->nomor_agenda,
            $row->surat->nomor_surat,
            $row->tanggal_terima,
            statusPengajuanConvert($row->status_pengajuan, 'status_pengajuan'),
            $row->catatan_pengajuan,
            $row->user->nama,
            $row->created_at,
            $row->updated_at,
        ];
    }
}
