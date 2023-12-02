<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AjukanRequest extends FormRequest
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
            'id_klasifikasi' => 'required',
            'nomor_agenda' => 'required',
            'id_surat' => 'required',
            'tanggal_terima' => 'required|date',
            'tujuan_ajuan' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'id_klasifikasi.required' => 'Harap isi Nomor Klasifikasi disposisi',
            'nomor_agenda.required' => 'Harap Isi Nomor Agenda disposisi',
            'id_surat.required' => 'Harap pilih surat disposisi',
            'tanggal_terima.required' => 'Harap tentukan tanggal terima diposisi',
            'tanggal_terima.date' => 'Tanggal terima harus dalam format tanggal',
            'tujuan_ajuan.date' => 'Tanggal terima harus dalam format tanggal',
        ];
    }
}
