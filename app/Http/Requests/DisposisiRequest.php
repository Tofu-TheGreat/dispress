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
            'tanggal_disposisi' => 'required|date',
            'id_posisi_jabatan' => 'required_without:id_penerima',
            'id_penerima' => 'required_without:id_posisi_jabatan',
        ];
    }
    public function messages()
    {
        return [
            'catatan_disposisi.required' => 'Harap isi catatan disposisi',
            'catatan_disposisi.min' => 'Catatan disposisi tidak boleh kurang dari 5 karakter',
            'catatan_disposisi.max' => 'Catatan disposisi tidak boleh lebih dari 100 karakter',
            'sifat_disposisi.required' => 'Harap pilih sifat disposisi',
            'status_disposisi.required' => 'Harap pilih status disposisi',
            'tanggal_disposisi.date' => 'Tanggal Disposisi harus dalam format tanggal',
            'id_posisi_jabatan.required_without' => 'Harap tentukan tujuan diposisi',
            'id_penerima.required_without' => 'Harap tentukan penerima diposisi',
        ];
    }
}
