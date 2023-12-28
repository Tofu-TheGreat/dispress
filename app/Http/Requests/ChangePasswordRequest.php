<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class ChangePasswordRequest extends FormRequest
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
            'password_lama' => 'required',
            'password_baru' => 'required',
            'password_baru_ulang' => 'required|same:password_baru'
        ];
    }
    public function messages()
    {
        return [
            'password_lama.required' => 'Kolom kata sandi saat ini wajib diisi.',
            'password_baru.required' => 'Kolom kata sandi baru wajib diisi.',
            'password_baru_ulang.required' => 'Kolom konfirmasi kata sandi wajib diisi.',
            'password_baru_ulang.same' => 'Konfirmasi kata sandi harus sesuai dengan kata sandi baru.',
        ];
    }
}
