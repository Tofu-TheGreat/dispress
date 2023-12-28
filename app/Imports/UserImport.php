<?php

namespace App\Imports;

use App\Models\PosisiJabatan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class UserImport implements ToModel, WithHeadingRow, WithValidation
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
            'id_posisi_jabatan'   =>  $this->transformJabatan($row['id_posisi_jabatan']), //Mengubah value jabatan serta mengubah letter case dari value yang dikirim
            'username'     => $row['username'],
            'email'    => $row['email'],
            'nomor_telpon'     => $row['nomor_telpon'],
            'password' => Hash::make($row['password']),
        ]);
    }

    public function rules(): array
    {
        return [
            'nip' => 'required|max:18|min:18|unique:users,nip,' . request()->get('id_user') . ',id_user',
            'nama' => 'required',
            'level' => 'required',
            'id_posisi_jabatan' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email,' . request()->get('id_user') . ',id_user',
            'nomor_telpon' => 'required|min:12|max:13|unique:users,nomor_telpon,' . request()->get('id_user') . ',id_user',
            'password' => 'required',

        ];
    }

    public function customValidationMessages()
    {
        return [
            'file.mimes' => 'Harap masukan format xlsx',
            'nip.required' => 'Harap masukkan NIP.',
            'nip.min' => 'NIP tidak boleh kurang dari 18',
            'nip.max' => 'NIP tidak boleh lebih dari 18',
            'nip.unique' => 'NIP sudah ada, harap masukan NIP lain',
            'nama.required' => 'Harap masukkan nama.',
            'level.required' => 'Harap masukan level.',
            'id_posisi_jabatan.required' => 'Harap masukan jabatan.',
            'username.required' => 'Harap masukkan username.',
            'email.required' => 'Harap masukkan alamat email.',
            'email.email' => 'Harap masukkan alamat email yang valid.',
            'email.unique' => 'Email sudah ada, harap masukan email lain',
            'nomor_telpon.required' => 'Harap masukkan nomor telepon.',
            'nomor_telpon.min' => 'Nomor telepon tidak boleh kurang dari 12',
            'nomor_telpon.max' => 'Nomor telepon tidak boleh lebih dari 13',
            'nomor_telpon.unique' => 'Nomor telepon sudah ada, harap masukan Nomor telepon lain',
            'password.required' => 'Harap masukkan password.',
        ];
    }

    public function transformJabatan($data)
    {
        // Assuming that 'nama_posisi_jabatan' is the column in the PosisiJabatan table
        $posisiJabatan = PosisiJabatan::where('nama_posisi_jabatan', $data)->first();

        // Check if the record was found
        if ($posisiJabatan) {
            return $posisiJabatan->id_posisi_jabatan;
        }

        // Return a default value or handle the case where the record was not found
        return null;
    }
}
