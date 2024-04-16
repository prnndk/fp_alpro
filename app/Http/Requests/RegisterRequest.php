<?php

namespace App\Http\Requests;

use App\Enums\RolesType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|unique:users,name|max:255',
            'email' => 'required|email:dns|unique:users,email',
            'password' => ['required','string','confirmed',Password::min(8)->numbers()],
            'password_confirmation' => 'required|string',
        ];
    }
}
