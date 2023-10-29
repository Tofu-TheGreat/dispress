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
            'nim' => 'required',
            'nama' => 'required',
            'level' => 'required',
            'jabatan' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'nomor_telpon' => 'required',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nim.required' => 'Harap masukkan NIM.',
            'nama.required' => 'Harap masukkan nama.',
            'level.required' => 'Harap pilih level.',
            'jabatan.required' => 'Harap pilih jabatan.',
            'username.required' => 'Harap masukkan username.',
            'email.required' => 'Harap masukkan alamat email.',
            'email.email' => 'Harap masukkan alamat email yang valid.',
            'nomor_telpon.required' => 'Harap masukkan nomor telepon.',
            'password.required' => 'Harap masukkan password.',
        ];
    }
}
