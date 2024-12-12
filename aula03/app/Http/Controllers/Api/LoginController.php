<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Http\Requests\LoginRequest;
use Exception;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(LoginRequest $request){
        try{
            $user = $request->user;
            if(!$user) throw new \Exception("Erro ao efetuar login!");
            $token = $user->createToken('token')->plainTextToken;
            return compact('token','user');
        }catch(Exception $error){
            $this->errorHandler('Erro ao realizar login!!!',$error);
        }
    }

    public function logout(Request $request){
        try{
            $request->user()->tokens()->delete();//deslogar de todas as sessões | dispositivos
            return response()->json(['message' => 'Logout realizado com sucesso!!!']);
        }catch(Exception $error){
            $this->errorHandler('Erro ao realizar logout!!!',$error);
        }
    }
}
