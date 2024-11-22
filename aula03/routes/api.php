<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('/produtos',ProdutoController::class)->middleware('auth:sanctum');
Route::apiResource('/produtos',ProdutoController::class)->only(['index','show']);

Route::apiResource('/users',UserController::class);
Route::apiResource('/users',UserController::class)
    ->middleware('auth:sanctum') //post, put, delete
    ->except(['index','show']); // não cria as rotas de index e show

Route::controller(LoginController::class)->group(function(){
    Route::post('/login','login');
    Route::post('/logout','logout')->middleware('auth:sanctum');
});
