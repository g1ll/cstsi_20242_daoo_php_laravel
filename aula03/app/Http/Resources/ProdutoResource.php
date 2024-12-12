<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;//JsonResponse (Synfoni)
use Illuminate\Support\Facades\Storage;

class ProdutoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "id" => $this->id,
            "nome" => $this->nome,
            "origem" => $this->importado?"Importado":"Nacional",
            "QtdEstoque" => $this->qtd_estoque,
            "descricao" => $this->descricao,
            "preco" => "R$ ".number_format($this->preco,2),
            'fornecedor' => FornecedorResource::make($this->whenLoaded('fornecedor')),
            'imagem'=>$this->when($this->imagem, env('APP_URL').Storage::url('produtos/' . $this->imagem))
        ];
    }
}
