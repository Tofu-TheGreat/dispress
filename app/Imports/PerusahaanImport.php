<?php

namespace App\Imports;

use App\Models\Perusahaan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PerusahaanImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        return new Perusahaan([
            'nama_perusahaan' => $row['nama_perusahaan'],
            'nomor_telpon' => $row['nomor_telpon'],
            'alamat_perusahaan' => $row['alamat_perusahaan'],
        ]);
    }

    public function rules(): array
    {
        return [
            'nama_perusahaan' => 'required',
            'nomor_telpon' => 'required|min:12|max:13|unique:perusahaan,nomor_telpon,' . request()->get('id_perusahaan') . ',id_perusahaan',
            'alamat_perusahaan' => 'required'
        ];
    }

    public function customValidationMessages()
    {
        return [
            'nama_perusahaan.required' => 'Nama Perusahaan tidak boleh kosong!',
            'nomor_telpon.required' => 'Harap masukkan nomor telepon.',
            'nomor_telpon.min' => 'Nomor telepon tidak boleh kurang dari 12',
            'nomor_telpon.max' => 'Nomor telepon tidak boleh lebih dari 13',
            'nomor_telpon.unique' => 'Harap Masukkan nomor telpon yang berbeda',
            'alamat_perusahaan.required' => 'Alamat Perusahaan tidak boleh kosong!',
        ];
    }
}
