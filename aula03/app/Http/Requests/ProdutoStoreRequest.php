<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoStoreRequest extends FormRequest
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
            "nome" => "required | max: 10",
            "importado" => "nullable | boolean",
            "imagem" => "nullable | image",
            "fornecedor_id"=> "required | exists:fornecedores,id",
            "qtd_estoque" => "required | numeric | min:2",
            "descricao" => "required | max:500",
            "preco" => "required | numeric | min:1.99"
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'importado'=>$this->has('importado')
        ]);
    }
}
