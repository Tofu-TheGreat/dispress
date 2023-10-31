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
    public function rules(): array
    {
        return [
            'nip' => 'required|max:18|min:18|unique:users,nip,' . $this->data . ',id_user',
            'nama' => 'required',
            'level' => 'required',
            'jabatan' => 'required',
            'username' => 'required',
            'email' =>
            'required|email|unique:users,email,' . $this->data . ',id_user',
            'nomor_telpon' =>
            'required|min:12|max:13|unique:users,nomor_telpon,' . $this->data . ',id_user',
            'password' => 'required',
            'foto_user' => 'image|mimes:jpeg,png,jpg|max:10240'
        ];
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
            'foto_user.mimes' => 'Harap masukan foto dengan format jpeg,png,jpg'
        ];
    }

    public $data;
    public function uniqueId($data)
    {
        $this->data = $data;
    }
}
