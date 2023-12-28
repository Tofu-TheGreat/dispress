<?php

namespace App\Imports;

use App\Models\Klasifikasi;
use Database\Factories\klasifikasiFactory;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class KlasifikasiImport implements ToModel, WithValidation, WithHeadingRow
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
        return new Klasifikasi([
            'nomor_klasifikasi'     => $row['nomor_klasifikasi'],
            'nama_klasifikasi'     => $row['nama_klasifikasi'],
        ]);
    }

    public function rules(): array
    {
        return [
            'nomor_klasifikasi' => 'required|min:3|max:10',
            'nama_klasifikasi' => 'required',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'nomor_klasifikasi.required' => 'Harap masukan Nomor Klasifikasi',
            'nomor_klasifikasi.min' => 'Nomor Klasifikasi minimal 3 baris',
            'nomor_klasifikasi.max' => 'Nomor Klasifikasi minimal 10 baris',
            'nama_klasifikasi.required' => 'Harap masukan Nama Klasifikasi'
        ];
    }
}
