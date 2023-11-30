<?php

namespace App\Imports;

use App\Models\Instansi;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class InstansiImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        return new Instansi([
            'nama_instansi' => $row['nama_instansi'],
            'nomor_telpon' => $row['nomor_telpon'],
            'alamat_instansi' => $row['alamat_instansi'],
        ]);
    }

    public function rules(): array
    {
        return [
            'nama_instansi' => 'required',
            'nomor_telpon' => 'required|min:12|max:13|unique:instansi,nomor_telpon,' . request()->get('id_instansi') . ',id_instansi',
            'alamat_instansi' => 'required'
        ];
    }

    public function customValidationMessages()
    {
        return [
            'nama_instansi.required' => 'Nama instansi tidak boleh kosong!',
            'nomor_telpon.required' => 'Harap masukkan nomor telepon.',
            'nomor_telpon.min' => 'Nomor telepon tidak boleh kurang dari 12',
            'nomor_telpon.max' => 'Nomor telepon tidak boleh lebih dari 13',
            'nomor_telpon.unique' => 'Harap Masukkan nomor telpon yang berbeda',
            'alamat_instansi.required' => 'Alamat instansi tidak boleh kosong!',
        ];
    }
}
