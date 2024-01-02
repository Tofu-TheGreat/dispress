<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    protected function prepareForValidation()
    {
        // Convert nomor_telpon to a numeric format
        $this->merge([
            'nomor_telpon' => currencyPhoneToNumeric($this->input('nomor_telpon')),
        ]);
    }
    public function rules(): array
    {
        return [
            'id_instansi' => 'required|exists:instansi,id_instansi',
            'id_ketua' => 'required|exists:users,id_user',
            'header_surat' => 'required|string',
            'kota_user' => 'required|string|max:225',
            'default_logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'nomor_telpon' => 'required|min:12|max:13|unique:instansi,nomor_telpon,' . $this->input('id_instansi') . ',id_instansi',
            'alamat_instansi' => 'required|min:5|max:150|',
            'email' => 'required|email|unique:instansi,email,' . $this->input('id_instansi') . ',id_instansi',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'id_instansi.required' => 'Kolom instansi wajib diisi.',
            'id_instansi.exists' => 'Instansi yang dipilih tidak valid.',
            'id_ketua.required' => 'Kolom ketua wajib diisi.',
            'id_ketua.exists' => 'Ketua yang dipilih tidak valid.',
            'header_surat.required' => 'Kolom Header Surat harus diisi.',
            'header_surat.string' => 'Kolom Header Surat harus berupa teks.',
            'kota_user.required' => 'Kolom Kota User harus diisi.',
            'kota_user.string' => 'Kolom Kota User harus berupa teks.',
            'kota_user.max' => 'Kolom Kota User tidak boleh lebih dari 50 karakter.',
            'default_logo.image' => 'Logo default harus berupa gambar.',
            'default_logo.mimes' => 'Logo default harus berupa file dengan tipe: jpeg, png, jpg, gif.',
            'default_logo.max' => 'Logo default tidak boleh lebih dari 2 megabyte.',
            'nomor_telpon.required' => 'Harap masukkan nomor telepon.',
            'nomor_telpon.min' => 'Nomor telepon tidak boleh kurang dari 12',
            'nomor_telpon.max' => 'Nomor telepon tidak boleh lebih dari 13',
            'nomor_telpon.unique' => 'Harap Masukkan nomor telpon yang berbeda',
            'alamat_instansi.required' => 'Alamat instansi tidak boleh kosong!',
            'alamat_instansi.min' => 'Alamat instansi tidak boleh kurang dari 5',
            'alamat_instansi.max' => 'Alamat instansi tidak boleh lebih dari 150',
            'email.required' => 'Email instansi tidak boleh kosong!',
            'email.email' => 'Harap masukkan alamat email yang valid.',
            'email.unique' => 'Harap Masukkan email yang berbeda',
        ];
    }
}
