<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index() {
        return view('first_page',
            [
                "title"=>"Página Inicial!!!",
                "content"=>"Bem vindo a página inicial!!!"
            ]);
    }
}
