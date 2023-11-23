<?php

namespace App\Exports;

use App\Models\Perusahaan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PerusahaanExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Perusahaan::get();
    }
    public function headings(): array
    {
        return [
            "No",
            "id_perusahaan",
            "nomor_telpon",
            "alamat_perusahaan",
            "created_at",
            "updated_at",
        ];
    }

    public function query()
    {
        return Perusahaan::query();
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
            $row->id_perusahaan,
            $nomor_telepon,
            $row->alamat_perusahaan,
            $row->created_at,
            $row->updated_at
        ];
    }
}
