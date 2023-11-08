<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        $rules = [
            'nip' => 'required|max:18|min:18|unique:users,nip,' . $this->input('id_user') . ',id_user',
            'nama' => 'required',
            'level' => 'required',
            'jabatan' => 'required',
            'username' => 'required',
            'nomor_telpon' => 'required|min:12|max:13|unique:users,nomor_telpon,' . $this->input('id_user') . ',id_user',
            'email' => 'required|email|unique:users,email,' . $this->input('id_user') . ',id_user',
            'foto_user' => 'image|mimes:jpeg,png,jpg|max:10240',
        ];

        // Check if this is a create request (not an update request)
        if ($this->isMethod('post')) {
            $rules['password'] = 'required';
        }

        return $rules;
    }
    public function messages()
    {
        return [
            'nip.required' => 'Harap masukkan NIP.',
            'nip.min' => 'NIP tidak boleh kurang dari 18',
            'nip.max' => 'NIP tidak boleh lebih dari 18',
            'nip.unique' => 'Harap Masukkan NIP yang berbeda',
            'nama.required' => 'Harap masukkan nama.',
            'level.required' => 'Harap pilih level.',
            'jabatan.required' => 'Harap pilih jabatan.',
            'username.required' => 'Harap masukkan username.',
            'email.required' => 'Harap masukkan alamat email.',
            'email.email' => 'Harap masukkan alamat email yang valid.',
            'email.unique' => 'Harap Masukkan email yang berbeda',
            'nomor_telpon.required' => 'Harap masukkan nomor telepon.',
            'nomor_telpon.min' => 'Nomor telepon tidak boleh kurang dari 12',
            'nomor_telpon.max' => 'Nomor telepon tidak boleh lebih dari 13',
            'nomor_telpon.unique' => 'Harap Masukkan nomor telpon yang berbeda',
            'password.required' => 'Harap masukkan password.',
            'foto_user.image' => 'Harap masukan foto',
            'foto_user.mimes' => 'Harap masukan foto dengan format :values.'
        ];
    }
}
