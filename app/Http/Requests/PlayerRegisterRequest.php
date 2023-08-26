<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerRegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstname'=>'required|string|max:255',
            'lastname'=>'required|string|max:255',
            'birthdate'=>'required|date',
            'phone'=>'required|max:15',
            'email'=>'required|email',
            'password'=>'required|string|min:8|confirmed',
        ];
    }
}
