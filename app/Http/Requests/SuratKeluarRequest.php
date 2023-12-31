<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratKeluarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Ganti menjadi 'true' jika authorization diperlukan.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'id_klasifikasi' => 'required|exists:klasifikasi,id_klasifikasi',
            'jumlah_lampiran' => 'string|max:3',
            'nomor_surat_keluar' => 'required|string|max:50|unique:surat_keluar,nomor_surat_keluar,' . $this->input('id_surat_keluar') . ',id_surat_keluar',
            'tanggal_surat_keluar' => 'required|date',
            'id_user' => 'required|exists:users,id_user',
            'tujuan_surat_keluar' => 'required',
            'sifat_surat_keluar' => 'required|string|max:50',
            'perihal' => 'required|string|max:50',
            'isi_surat' => 'required',
            'tembusan' => 'nullable|string|max:50',
        ];
    }
    public function messages(): array
    {
        return [
            'id_klasifikasi.required' => 'Klasifikasi wajib diisi.',
            'id_klasifikasi.exists' => 'Klasifikasi yang dipilih tidak valid.',
            'nomor_surat_keluar.required' => 'Nomor surat wajib diisi.',
            'nomor_surat_keluar.string' => 'Nomor surat harus berupa string.',
            'nomor_surat_keluar.max' => 'Nomor surat tidak boleh lebih dari :max karakter.',
            'nomor_surat_keluar.unique' => 'Nomor surat sudah terpakai',
            'tanggal_surat_keluar.required' => 'Tanggal surat wajib diisi.',
            'tanggal_surat_keluar.date' => 'Tanggal surat harus berupa format tanggal yang valid.',
            'id_user.required' => 'User pengirim wajib diisi.',
            'id_user.exists' => 'User pengirim tidak valid.',
            'tujuan_surat_keluar.required' => 'Penerima wajib diisi.',
            'tujuan_surat_keluar.max' => 'Penerima tidak boleh lebih dari :max karakter.',
            'jumlah_lampiran.string' => 'Jumlah Lampiran harus berupa string.',
            'jumlah_lampiran.max' => 'Jumlah Lampiran tidak boleh lebih dari :max karakter.',
            'perihal.required' => 'Perihal wajib diisi.',
            'perihal.string' => 'Perihal harus berupa string.',
            'perihal.max' => 'Perihal tidak boleh lebih dari :max karakter.',
            'sifat_surat_keluar.required' => 'Sifat Surat wajib diisi.',
            'sifat_surat_keluar.string' => 'Sifat Surat harus berupa string.',
            'sifat_surat_keluar.max' => 'Sifat Surat tidak boleh lebih dari :max karakter.',
            'isi_surat.required' => 'Isi surat wajib diisi.',
            'tembusan.string' => 'Tembusan harus berupa string.',
            'tembusan.max' => 'Tembusan tidak boleh lebih dari :max karakter.',
            'scan_dokumen.mimes' => 'Dokumen harus berupa file PDF.',
            'scan_dokumen.max' => 'Ukuran dokumen tidak boleh lebih dari :max kilobyte.',
        ];
    }
}
