<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;//JsonResponse (Synfoni)

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
            "nome" => $request->nome,
            "origem" => $request->importado?"Importado":"Nacional",
            "QtdEstoque" => $request->qtd_estoque,
            "descricao" => $request->descricao,
            "preco" => "R$ ".number_format($request->preco,2),
        ];
    }
}
