<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index_json() {
        $listaProdutos = Produto::all();
        return response()->json(["data"=>$listaProdutos]);
    }

    public function index() {
        $listaProdutos = Produto::all();
        return view('produto.index',["data"=>$listaProdutos]);
    }

    public function show($id){
        $produto = Produto::find($id);
        // echo Produto::where('id',$id)->toSql();//roda internamente o sql
        //dd($produto); //mostra os dados de $produto (var_dump e die)

        return view('produto.show',[
                "produto"=>$produto
            ]);
    }
}
