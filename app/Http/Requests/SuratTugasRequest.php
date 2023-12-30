<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratTugasRequest extends FormRequest
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
            'id_klasifikasi' => 'required|exists:klasifikasi,id_klasifikasi',
            'nomor_surat_tugas' => 'required|string|max:50|unique:surat_tugas,nomor_surat_tugas,' . $this->input('id_surat_tugas') . ',id_surat_tugas',
            'dasar' => 'string',
            'id_user_penerima' => 'required|array', // Assuming it should be an array
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'tujuan_pelaksanaan' => 'required|string',
            'tempat_pelaksanaan' => 'required|string|max:100',
            'tembusan' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'id_klasifikasi.required' => 'Kolom Klasifikasi harus diisi.',
            'id_klasifikasi.exists' => 'Klasifikasi yang dipilih tidak valid.',
            'nomor_surat_tugas.required' => 'Kolom Nomor Surat Tugas harus diisi.',
            'nomor_surat_tugas.string' => 'Kolom Nomor Surat Tugas harus berupa teks.',
            'nomor_surat_tugas.max' => 'Kolom Nomor Surat Tugas tidak boleh lebih dari 50 karakter.',
            'nomor_surat_tugas.unique' => 'Nomor Surat Tugas tersebut sudah digunakan.',
            'dasar.string' => 'Kolom Dasar harus berupa teks.',
            'id_user_penerima.required' => 'Kolom User Penerima harus diisi.',
            'id_user_penerima.array' => 'Kolom User Penerima harus berupa array.',
            'tanggal_mulai.required' => 'Kolom Tanggal Mulai harus diisi.',
            'tanggal_mulai.date' => 'Kolom Tanggal Mulai harus berupa tanggal yang valid.',
            'tanggal_selesai.required' => 'Kolom Tanggal Selesai harus diisi.',
            'tanggal_selesai.date' => 'Kolom Tanggal Selesai harus berupa tanggal yang valid.',
            'waktu_mulai.required' => 'Kolom Waktu Mulai harus diisi.',
            'waktu_selesai.required' => 'Kolom Waktu Selesai harus diisi.',
            'tujuan_pelaksanaan.required' => 'Kolom Tujuan Pelaksanaan harus diisi.',
            'tujuan_pelaksanaan.string' => 'Kolom Tujuan Pelaksanaan harus berupa teks.',
            'tempat_pelaksanaan.required' => 'Kolom Tempat Pelaksanaan harus diisi.',
            'tempat_pelaksanaan.string' => 'Kolom Tempat Pelaksanaan harus berupa teks.',
            'tempat_pelaksanaan.max' => 'Kolom Tempat Pelaksanaan tidak boleh lebih dari 100 karakter.',
            'tembusan.required' => 'Kolom Tembusan harus diisi.',
            'tembusan.string' => 'Kolom Tembusan harus berupa teks.',
        ];
    }
}
