<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class AdminImport implements ToModel, WithHeadingRow, WithValidation
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
            'jabatan'     => $this->transformJabatan(Str::title($row['jabatan'])), //Mengubah value jabatan serta mengubah letter case dari value yang dikirim
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
            'jabatan' => 'required',
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
            'jabatan.required' => 'Harap masukan jabatan.',
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
        //Mengubah value jabatan agar sesuai dengan nilai di database
        switch ($data) {
            case 'Kepala Sekolah':
                return '0';
            case 'Wakil Kepala Sekolah':
                return '1';
            case 'Kurikulum':
                return '2';
            case 'Kesiswaan':
                return '3';
            case 'Sarana Dan Prasarana':
                return '4';
            case 'Kepala Jurusan':
                return '5';
            case 'Hubin':
                return '6';
            case 'Bimbingan Konseling':
                return '7';
            case 'Guru Umum':
                return '8';
            case 'Tata Usaha':
                return '9';
            default:
                return 'Tidak Diketahui';
        }
    }
}
