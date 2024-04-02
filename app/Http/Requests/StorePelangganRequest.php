<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePelangganRequest extends FormRequest
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
            'nik'=>'required|numeric|min_digits:16|max_digits:16|unique:pelanggans,nik',
            'user_id'=>'required|exists:users,id|unique:pelanggans,user_id',
            'address'=>'required|string',
            'phone'=>'required|numeric|min_digits:10|max_digits:13|unique:pelanggans,phone',
        ];
    }
}
