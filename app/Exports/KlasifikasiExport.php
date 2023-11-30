<?php

namespace App\Exports;

use App\Models\Klasifikasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KlasifikasiExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Klasifikasi::get();
    }

    public function headings(): array
    {
        return [
            "No",
            "nomor_klasifikasi",
            "nama_klasifikasi",
            "created_at",
            "updated_at",
        ];
    }

    public function query()
    {
        return Klasifikasi::query();
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
            $row->id_instansi,
            $nomor_telepon,
            $row->created_at,
            $row->updated_at
        ];
    }
}
