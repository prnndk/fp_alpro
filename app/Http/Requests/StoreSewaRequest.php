<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSewaRequest extends FormRequest
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
            'tanggal_sewa' => 'required|date',
            'tanggal_perkiraan_kembali' => 'required|date',
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'users_id' => 'required|exists:users,id',
        ];
    }
}
