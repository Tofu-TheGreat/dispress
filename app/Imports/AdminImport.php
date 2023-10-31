<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;


class AdminImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'nip' => $row['nip'],
            'nama'     => $row['nama'],
            'level'     => $row['level'],
            'jabatan'     => $this->transformJabatan($row['jabatan']),
            'username'     => $row['username'],
            'email'    => $row['email'],
            'nomor_telpon'     => $row['username'],
            'password' => Hash::make($row['password']),
        ]);
    }

    public function transformJabatan($data)
    {
        switch ($data) {
            case 'Kepala Sekolah':
                return 0;
            case 'Wakil Kepala Sekolah':
                return 1;
            case 'Kurikulum':
                return 2;
            case 'Kesiswaan':
                return 3;
            case 'Sarana dan Prasarana':
                return 4;
            case 'Kepala Jurusan':
                return 5;
            case 'Hubin':
                return 6;
            case 'Bimbingan Konseling':
                return 7;
            case 'Guru Umum':
                return 8;
            case 'Tata Usaha':
                return 9;
            default:
                return 'Tidak Diketahui';
        }
    }
}
