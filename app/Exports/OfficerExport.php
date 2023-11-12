<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\User;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class OfficerExport implements WithColumnFormatting, FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function columnFormats(): array
    {
        //Mengganti format untuk kolum B kebawah menjadi format:text
        return [
            'B:B' => NumberFormat::FORMAT_TEXT,
        ];
    }

    public function collection()
    {
        return User::where('level', 'officer')->get();
    }

    public function headings(): array
    {
        return [
            "id_user",
            "nip",
            "nama",
            "level",
            "jabatan",
            "username",
            'email',
            'nomor_telpon',
            "created_at",
            "updated_at",
        ];
    }

    public function query()
    {
        return User::query();
    }

    public function map($row): array
    {
        // Manipulasi data sebelum ditampilkan di Excel
        $nip = '="' . $row->nip . '"'; // Memaksa teks dengan tanda "="

        return [
            $row->id_user,
            $nip,
            $row->nama,
            $row->level,
            $this->convertJabatan($row->jabatan), //Value jabatan akan diubah menjadi kata kata
            $row->username,
            $row->email,
            $row->nomor_telpon,
            $row->created_at,
            $row->updated_at
        ];
    }

    private function convertJabatan($data)
    {
        //mengubah value jabatan
        switch ($data) {
            case 0:
                return 'Kepala Sekolah';
            case 1:
                return 'Wakil Kepala Sekolah';
            case 2:
                return 'Kurikulum';
            case 3:
                return 'Kesiswaan';
            case 4:
                return 'Sarana dan Prasarana';
            case 5:
                return 'Kepala Jurusan';
            case 6:
                return 'Hubin';
            case 7:
                return 'Bimbingan Konseling';
            case 8:
                return 'Guru Umum';
            case 9:
                return 'Tata Usaha';
            default:
                return 'Tidak Diketahui';
        }
    }
}
