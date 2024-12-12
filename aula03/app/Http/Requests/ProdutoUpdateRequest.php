<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoUpdateRequest extends FormRequest
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
            "nome" => "nullable | max: 10",
            "importado" => "nullable | boolean",
            "imagem" => "nullable | image",
            "qtd_estoque" => "nullable | numeric | min:2",
            "descricao" => "nullable | max:500",
            "preco" => "nullable | numeric | min:1.99"
        ];
    }
}
