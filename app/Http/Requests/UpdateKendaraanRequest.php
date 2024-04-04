<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKendaraanRequest extends FormRequest
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
            'name' => 'required|string',
            'merk' => 'required|string',
            'plat_nomor' => 'required|string|max:13',
            'harga' => 'required|numeric',
            'warna' => 'required|string|max:15',
            'kondisi' => 'required|string',
            'tipe_kendaraan_id' => 'required|exists:tipe_kendaraans,id',
            'pemilik_id' => 'required|exists:pemiliks,id',
        ];
    }
}
