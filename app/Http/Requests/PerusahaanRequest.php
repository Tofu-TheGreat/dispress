<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerusahaanRequest extends FormRequest
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
            'nama_perusahaan' => 'required',
            'nomor_telpon' => 'required|min:12|max:13|unique:perusahaan,nomor_telpon,' . $this->input('id_perusahaan') . ',id_perusahaan',
            'alamat_perusahaan' => 'required'
        ];

        return $rules;
    }
    public function messages()
    {
        return [
            'nama_perusahaan.required' => 'Nama Perusahaan tidak boleh kosong!',
            'nomor_telpon.required' => 'Harap masukkan nomor telepon.',
            'nomor_telpon.min' => 'Nomor telepon tidak boleh kurang dari 12',
            'nomor_telpon.max' => 'Nomor telepon tidak boleh lebih dari 13',
            'nomor_telpon.unique' => 'Harap Masukkan nomor telpon yang berbeda',
            'alamat_perusahaan.required' => 'Alamat Perusahaan tidak boleh kosong!',
        ];
    }
}
