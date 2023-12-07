<?php

namespace App\Imports;

use App\Models\PosisiJabatan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;

class PosisiJabatanImport implements ToCollection, ToModel, WithValidation
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        //
    }
    public function model(array $row)
    {
        return new PosisiJabatan([
            'nama_posisi_jabatan' => $row['nama_posisi_jabatan'],
            'deskripsi_jabatan'     => $row['deskripsi_jabatan'],
            'tingkat_jabatan'     => $row['tingkat_jabatan'],
        ]);
    }

    public function rules(): array
    {
        return [
            'nama_posisi_jabatan' => 'required',
            'deskripsi_jabatan' => 'required',
            'tingkat_jabatan' => 'required',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'nama_posisi_jabatan.required' => 'Harap isi Nama Posisi Jabatan',
            'deskripsi_jabatan.required' => 'Harap isi Deskripsi Jabatan',
            'tingkat_jabatan.required' => 'Harap isi Tingkat Jabatan',
        ];
    }
}
