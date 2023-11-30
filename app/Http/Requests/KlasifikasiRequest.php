<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KlasifikasiRequest extends FormRequest
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
            'nomor_klasifikasi' => 'required|min:3|max:10',
            'nama_klasifikasi' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nomor_klasifikasi.required' => 'Harap masukan Nomor Klasifikasi',
            'nomor_klasifikasi.min' => 'Nomor Klasifikasi minimal 3 baris',
            'nomor_klasifikasi.max' => 'Nomor Klasifikasi minimal 10 baris',
            'nama_klasifikasi.required' => 'Harap masukan Nama Klasifikasi'
        ];
    }
}
