<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;

class AdminExport implements WithColumnFormatting, FromCollection, WithHeadings, WithMapping
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
        return User::where('level', 'admin')->get();
    }

    public function headings(): array
    {
        return [
            "No",
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
        static $rowNumber = 0;
        $rowNumber++;
        // Manipulasi data sebelum ditampilkan di Excel
        $nip = '="' . $row->nip . '"'; // Memaksa teks dengan tanda "="
        $nomor_telepon = '="' . $row->nomor_telpon . '"'; // Memaksa teks dengan tanda "="

        return [
            $rowNumber,
            $row->id_user,
            $nip,
            $row->nama,
            $row->level,
            $row->posisijabatan->nama_posisi_jabatan, //Value jabatan akan diubah menjadi kata kata
            $row->username,
            $row->email,
            $nomor_telepon,
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
