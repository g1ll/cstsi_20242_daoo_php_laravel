<?php

namespace App\Http\Requests;

use App\Models\User;
use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ];
    }

    protected function passedValidation(): void
    {
        $user = User::where('email', $this->input('email'))->first();
        if(!Hash::check($this->password,$user->password))
            throw new Exception('Credenciais inválidas!!!');
        $this->merge(['user' => $user]);
    }
}
