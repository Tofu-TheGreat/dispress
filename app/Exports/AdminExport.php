<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\BeforeWriting;

class AdminExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::where('level', 'admin')->get();
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
        return [
            $row->id_user,
            $row->nip,
            $row->nama,
            $row->level,
            $this->convertJabatan($row->jabatan),
            $row->username,
            $row->email,
            $row->nomor_telpon,
            $row->created_at,
            $row->updated_at
        ];
    }

    public static function beforeWriting(BeforeWriting $event)
    {
        //
    }

    private function convertJabatan($data)
    {
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
