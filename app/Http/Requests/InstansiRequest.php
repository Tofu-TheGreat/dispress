<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstansiRequest extends FormRequest
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
            'nama_instansi' => 'required',
            'nomor_telpon' => 'required|min:12|max:13|unique:instansi,nomor_telpon,' . $this->input('id_instansi') . ',id_instansi',
            'alamat_instansi' => 'required|min:5|max:150|',
            'email' => 'required|email|unique:instansi,email,' . $this->input('id_instansi') . ',id_instansi',
            'foto_instansi' => 'image|mimes:jpeg,png,jpg|max:10240',
        ];

        return $rules;
    }
    public function messages()
    {
        return [
            'nama_instansi.required' => 'Nama instansi tidak boleh kosong!',
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
            'foto_instansi.image' => 'Harap masukan foto',
            'foto_instansi.mimes' => 'Harap masukan foto dengan format :values.'
        ];
    }
}
