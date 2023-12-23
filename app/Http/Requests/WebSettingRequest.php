<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebSettingRequest extends FormRequest
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
            'id_instansi' => 'required|exists:instansi,id_instansi',
            'id_ketua' => 'required|exists:users,id_user',
            'default_logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'id_instansi.required' => 'Kolom instansi wajib diisi.',
            'id_instansi.exists' => 'Instansi yang dipilih tidak valid.',
            'id_ketua.required' => 'Kolom ketua wajib diisi.',
            'id_ketua.exists' => 'Ketua yang dipilih tidak valid.',
            'default_logo.image' => 'Logo default harus berupa gambar.',
            'default_logo.mimes' => 'Logo default harus berupa file dengan tipe: jpeg, png, jpg, gif.',
            'default_logo.max' => 'Logo default tidak boleh lebih dari 2 megabyte.',

        ];
    }
}
