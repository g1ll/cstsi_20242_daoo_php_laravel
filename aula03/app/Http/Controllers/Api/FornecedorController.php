<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Http\Requests\FornecedorStoreRequest;
use App\Http\Resources\FornecedorCollection;
use App\Http\Resources\FornecedorResource;
use App\Models\Fornecedor;
use Exception;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new FornecedorCollection(Fornecedor::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FornecedorStoreRequest $request)
    {
        try{
            return new FornecedorResource(Fornecedor::create($request->validated()));
        }catch(Exception $error){
            $this->errorHandler('Erro ao criar novo fornecedor!!!',$error);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Fornecedor $fornecedor)
    {
        return new FornecedorResource($fornecedor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fornecedor $fornecedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fornecedor $fornecedor)
    {
        //
    }

    public function porRegiao($nome)
    {
        return new FornecedorCollection(
            Fornecedor::whereHas(
                'estado',
                fn($q) => $q->whereHas(
                    'regiao',
                    fn($q) => $q->where('nome', 'like', $nome)
                )
            )
            ->get()
            ->load('estado.regiao')
        );
    }
}
