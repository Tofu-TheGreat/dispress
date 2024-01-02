<?php

namespace App\Exports;

use App\Models\SuratTugas;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class SuratTugasExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting
{

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return SuratTugas::all();
    }


    public function headings(): array
    {
        return [
            'Id Klasifikasi',
            'Nomor Surat Tugas',
            'Id User',
            'Dasar',
            'Id User Penerima',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Waktu Mulai',
            'Waktu Selesai',
            'Tujuan Pelaksanaan',
            'Tempat Pelaksanaan',
            'Tembusan',
        ];
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function flattenArray($array)
    {
        $result = [];

        foreach ($array as $value) {
            if (is_array($value)) {
                $result = array_merge($result, $this->flattenArray($value));
            } else {
                $result[] = $value;
            }
        }

        return $result;
    }

    public function map($row): array
    {
        $id_user_penerima = $row->id_user_penerima;

        if (is_string($id_user_penerima)) {
            $id_user_penerima = json_decode($id_user_penerima, true);

            if (!is_array($id_user_penerima)) {
                $id_user_penerima = explode(',', $row->id_user_penerima);
            }
        }

        // Flatten the array if it's nested
        $flattenedIds = $this->flattenArray($id_user_penerima);

        $userNames = User::whereIn('id_user', $flattenedIds)->pluck('nama')->toArray();

        return [
            $row->klasifikasi->nomor_klasifikasi,
            $row->nomor_surat_tugas,
            $row->id_user,
            $row->dasar,
            implode(', ', $userNames),
            $row->tanggal_mulai,
            $row->tanggal_selesai,
            $row->waktu_mulai,
            $row->waktu_selesai,
            $row->tujuan_pelaksanaan,
            $row->tempat_pelaksanaan,
            $row->tembusan,
        ];
    }


    /**
     * Format columns
     *
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'G' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'H' => NumberFormat::FORMAT_DATE_TIME3,
            'I' => NumberFormat::FORMAT_DATE_TIME3,
        ];
    }
}
