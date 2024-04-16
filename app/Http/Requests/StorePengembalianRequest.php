<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePengembalianRequest extends FormRequest
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
            'sewa_id' => ['required', 'integer', 'exists:sewas,id'],
            'tanggal_kembali' => ['required', 'date', 'before_or_equal:today'],
            'denda' => ['numeric'],
            'kondisi' => ['required', 'string'],
        ];
    }
}
