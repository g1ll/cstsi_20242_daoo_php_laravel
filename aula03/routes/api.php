<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



// // Only é após registro de todas as rotas COM  middleware
// Route::apiResource('/produtos',ProdutoController::class)->middleware('auth:sanctum');
// Route::apiResource('/produtos',ProdutoController::class)->only(['index','show']);


// //Except é após o registro de todas as rotas SEM middleware
// Route::apiResource('/users',UserController::class);
// Route::apiResource('/users',UserController::class)
//     ->middleware('auth:sanctum') //post, put, delete com middleware
//     ->except(['index','show']); // não cria as rotas de index e show

//Agrupando por middleware sanctum todas as rotas de produtos e usuários
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/produtos', ProdutoController::class);
    Route::apiResource('/users', UserController::class);
});

//Liberando apenas as rotas index e show
Route::apiResource('/produtos', ProdutoController::class)->only(['index', 'show']);
Route::apiResource('/users', UserController::class)->only(['store']);


Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
});
