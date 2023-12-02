<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisposisiRequest extends FormRequest
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
            // 'id_surat',
            // 'tanggal_disposisi' => 'required|date',
            'catatan_disposisi' => 'required|min:5|max:100',
            'sifat_disposisi' => 'required',
            'status_disposisi' => 'required',
            'tujuan_disposisi' => 'required',
            'id_user' => 'required',
        ];
    }
    public function messages()
    {
        return [
            // 'tanggal_disposisi.required' => 'Harap masukkan tanggal disposisi',
            // 'tanggal_disposisi.date' => 'Tanggal disposisi harus berupa tanggal',
            'catatan_disposisi.required' => 'Harap isi catatan disposisi',
            'catatan_disposisi.max' => 'Catatan disposisi tidak boleh lebih dari 100 karakter',
            'sifat_disposisi.required' => 'Harap pilih sifat disposisi',
            'status_disposisi.required' => 'Harap pilih status disposisi',
            'tujuan_disposisi.required' => 'Harap tentukan tujuan diposisi',
            'id_user.required' => 'Harap tentukan penerima diposisi',
        ];
    }
}
