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
            'nim' => 'required|max:11|min:11',
            'nama' => 'required',
            'level' => 'required',
            'jabatan' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'nomor_telpon' => 'required|min:12|max:13',
            'password' => 'required',
            'foto_user' => 'image|mimes:jpeg,png,jpg|max:10240'
        ];
    }
    public function messages()
    {
        return [
            'nim.required' => 'Harap masukkan NIM.',
            'nim.min' => 'NIM tidak boleh kurang dari 11',
            'nim.max' => 'NIM tidak boleh lebih dari 11',
            'nama.required' => 'Harap masukkan nama.',
            'level.required' => 'Harap pilih level.',
            'jabatan.required' => 'Harap pilih jabatan.',
            'username.required' => 'Harap masukkan username.',
            'email.required' => 'Harap masukkan alamat email.',
            'email.email' => 'Harap masukkan alamat email yang valid.',
            'nomor_telpon.required' => 'Harap masukkan nomor telepon.',
            'nomor_telpon.min' => 'Nomor telepon tidak boleh kurang dari 12',
            'nomor_telpon.max' => 'Nomor telepon tidak boleh lebih dari 13',
            'password.required' => 'Harap masukkan password.',
            'foto_user.image' => 'Harap masukan foto',
            'foto_user.mimes' => 'Harap masukan foto dengan format jpeg,png,jpg'
        ];
    }
}
