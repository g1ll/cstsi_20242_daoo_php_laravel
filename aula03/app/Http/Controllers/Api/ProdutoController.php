<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProdutoCollection;
use App\Http\Resources\ProdutoResource;
use App\Models\Produto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return response()->json(Produto::all());
        return new ProdutoCollection(Produto::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $request->validate(["preco" => "required | numeric | min:1.99"]);
            $produto = $request->all();
            $produto['importado'] = $request->has('importado');
            $produtoCriado = Produto::create($produto);
                return response()->json([
                    "message" => 'Produto Criado!!!',
                    "data" => $produtoCriado
                ], 201);
        } catch (Exception $error) {
            $httpStatus = 500;
            if($error instanceof ValidationException){
                //executar outras tarefas relacionadas..
                throw $error;
            }
            return response()->json('Erro ao criar novo produto!!!', $httpStatus);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return new ProdutoResource($produto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
