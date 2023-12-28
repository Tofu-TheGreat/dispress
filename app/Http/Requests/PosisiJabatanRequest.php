<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PosisiJabatanRequest extends FormRequest
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
            'nama_posisi_jabatan' => 'required',
            'deskripsi_jabatan' => 'required',
            'tingkat_jabatan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_posisi_jabatan.required' => 'Harap isi Nama Posisi Jabatan',
            'deskripsi_jabatan.required' => 'Harap isi Deskripsi Jabatan',
            'tingkat_jabatan.required' => 'Harap isi Tingkat Jabatan',
        ];
    }
}
