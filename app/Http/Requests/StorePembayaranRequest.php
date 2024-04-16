<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Livewire\Attributes\Rule;

class StorePembayaranRequest extends FormRequest
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
            'sewa_id' => 'required|exists:sewas,id',
            'bukti_pembayaran'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pembayaran_via' => 'required|string|max:40',
            'jumlah_dibayarkan' => 'required|numeric',
            'type_pembayaran' => ['required',\Illuminate\Validation\Rule::enum(\App\Enums\TipePembayaranType::class) ,'string'],
            'status_pembayaran' => ['required',\Illuminate\Validation\Rule::enum(\App\Enums\StatusPembayaranType::class)]
        ];
    }
}
