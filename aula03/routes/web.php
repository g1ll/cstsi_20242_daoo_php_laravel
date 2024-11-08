<?php

use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola', function () {
    echo "Olá Mundo !!!";
});

Route::get('/hello',function(){
    return view('hello_page',
        ["message"=>"Hello World!!"]
    );
});

Route::get('/home',[HomeController::class,'index']);

Route::prefix('/produtos')->group(function () {
    Route::get('/', [ProdutoController::class, 'index'])->name("produto.index");
    Route::get('/{id}',[ProdutoController::class, 'show'])->name("produto.show");
});

Route::prefix('/produto')->group(function () {
    Route::get('/',[ProdutoController::class, 'create'] )->name("produto.create");
    Route::post('/',[ProdutoController::class, 'store'])->name("produto.store");
    Route::get('/{id}/edit',[ProdutoController::class, 'edit'])->name("produto.edit");
    Route::post('/{id}/update',[ProdutoController::class, 'update'])->name("produto.update");
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
