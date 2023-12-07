<?php

namespace App\Exports;

use App\Models\PosisiJabatan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PosisiJabatanExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        PosisiJabatan::get();
    }
    public function headings(): array
    {
        return [
            "No",
            'nama_posisi_jabatan',
            'deskripsi_jabatan',
            'tingkat_jabatan',
        ];
    }

    public function query()
    {
        return PosisiJabatan::query();
    }

    public function map($row): array
    {
        static $rowNumber = 0;
        $rowNumber++;
        // Manipulasi data sebelum ditampilkan di Excel
        $nip = '="' . $row->nip . '"'; // Memaksa teks dengan tanda "="
        $nomor_telepon = '="' . $row->nomor_telpon . '"'; // Memaksa teks dengan tanda "="

        return [
            $rowNumber,
            $row->nama_posisi_jabatan,
            $row->deskripsi_jabatan,
            $row->tingkat_jabatan,
            $row->created_at,
            $row->updated_at
        ];
    }
}
