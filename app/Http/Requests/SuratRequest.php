<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratRequest extends FormRequest
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
            'nomor_surat' => 'required|unique:surat,nomor_surat,' . $this->input('id_surat') . ',id_surat',
            'tanggal_surat' => 'required|date',
            'isi_surat' => 'required|max:100',
            'id_perusahaan' => 'required',
            'catatan_verifikasi' => 'required',
            'scan_dokumen' => 'mimes:pdf, docx|file',
        ];
    }
    public function messages()
    {
        return [
            'nomor_surat.required' => 'Nomor surat harus diisi',
            'nomor_surat.unique' => 'Nomor surat sudah terpakai',
            'tanggal_surat.required' => 'Tanggal surat harus diisi',
            'tanggal_surat.date' => 'Tanggal surat salah',
            'isi_surat.required' => 'Isi surat harus diisi',
            'isi_surat.max' => 'Isi surat tidak boleh lebih dari 100 karakter',
            'catatan_verifikasi.required' => 'Catatan surat harus diisi',
            'id_perusahaan.required' => 'Pengirim surat harus diisi',
            'scan_dokumen.mimes' => 'Tipe file harus pdf, docx',
            'scan_dokumen.file' => 'Harus berupa file!',
        ];
    }
}
