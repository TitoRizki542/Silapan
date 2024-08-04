<?php

namespace App\Http\Requests;

use App\Models\UserDetail;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserDetailRequest extends FormRequest
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
            'nama_depan' => ['required', 'string', 'max:30'],
            'nama_belakang' => ['required', 'string', 'max:30'],
            'nik' => ['required', 'numeric', 'digits:16', Rule::unique(UserDetail::class)->ignore($this->user()->user_detail->id)],
            'no_hp' => ['required', 'numeric', 'max_digits:14'],
            'rt' => ['required', 'numeric', 'max_digits:3'],
            'rw' => ['required', 'numeric', 'max_digits:3'],
            'kelurahan_desa' => ['required', 'string', 'max:50'],
            'kecamatan' => ['required', 'string', 'max:50'],
            'agama' => ['required', 'string', 'max:50'],
            'tanggal_lahir' => ['required', 'date'],
        ];
    }

    public function messages()
    {
        return [
            'kelurahan_desa.required' => 'kelurahan atau desa wajib diisi.',
            'kelurahan_desa.max' => 'kelurahan desa maksimal berisi 50 karakter.'
        ];
    }
}
