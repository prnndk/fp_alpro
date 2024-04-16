<?php

namespace App\Http\Requests;

use App\Enums\StatusPembayaranType;
use App\Enums\TipePembayaranType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePembayaranRequest extends FormRequest
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
            'jumlah_dibayarkan' => 'required|numeric',
            'status_pembayaran' => ['required', 'string', Rule::enum(StatusPembayaranType::class)],
            'type_pembayaran' => ['required', 'string', Rule::enum(TipePembayaranType::class)],
            'rejected_message'=>'nullable|string|required_if:status_pembayaran,ditolak',
            'bukti_pembayaran' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
