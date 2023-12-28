<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengajuanRequest extends FormRequest
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
            'nomor_agenda' => 'required|unique:pengajuan,nomor_agenda,' . $this->input('id_pengajuan') . ',id_pengajuan',
            'id_surat' => 'required',
            'tanggal_terima' => 'required|date',
        ];
    }
    public function messages()
    {
        return [
            'id_klasifikasi.required' => 'Harap pilih Nomor Klasifikasi Disposisi',
            'nomor_agenda.required' => 'Harap isi Nomor Agenda Disposisi',
            'nomor_agenda.unique' => 'Nomor Agenda sudah terpakai',
            'id_surat.required' => 'Harap pilih surat Disposisi',
            'tanggal_terima.required' => 'Harap tentukan tanggal terima diposisi',
            'tanggal_terima.date' => 'Tanggal terima harus dalam format tanggal',
        ];
    }
}
