<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ProdutoController extends Controller
{
    public function index_json() {
        $listaProdutos = Produto::all();
        return response()->json(["data"=>$listaProdutos]);
    }

    public function index() {
        $listaProdutos = Produto::all();
        // dd($listaProdutos);//helpers

        return view('produto.index',["data"=>$listaProdutos]);//helper
        // return View::make('produto.index',["data"=>$listaProdutos]);
    }

    public function show($id){
        // dd($id);
        $produto = Produto::find($id);
        // dd($produto);
        // DB::table('produtos')->where('id',$id)->get();//NÃO PODE
        // Produto::where('')->join()//EMENTA DA DISCIPLINA EH ORM
        // echo Produto::where('id',$id)->toSql();//roda internamente o sql
        //dd($produto); //mostra os dados de $produto (var_dump e die)

        return view('produto.show',[
                "produto"=>$produto
            ]);
    }
}
