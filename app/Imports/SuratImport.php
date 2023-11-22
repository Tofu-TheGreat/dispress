<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Surat;
use Maatwebsite\Excel\Concerns\WithValidation;

class SuratImport implements ToCollection, ToModel, WithValidation
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
        return new Surat([
            'nomor_surat' => $row['nomor_surat'],
            'tanggal_surat' => $row['tanggal_surat'],
            'isi_surat' => $row['isi_surat'],
            // 'id_perusahaan'=>row
        ]);
    }

    public function rules(): array
    {
        return [];
    }

    // // public function convertPerusahaan($data)
    // // {
    // //     switch($data)
    // //     {
    // //         case
    // //     }
    // }
}
