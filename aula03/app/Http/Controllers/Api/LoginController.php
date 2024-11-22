<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request){
        try{
            $user = $request->user;
            if(!Hash::check($request->password,$user->password)){
                throw new Exception('Credenciais inválidas!!!');
            }
            $token = $user->createToken('token')->plainTextToken;
            return response()->json(['token' => $token]);
            // return response()->json(compact($token));
            // return compact($token);
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
