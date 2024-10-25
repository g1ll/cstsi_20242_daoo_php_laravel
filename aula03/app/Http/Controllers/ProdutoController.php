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
}
