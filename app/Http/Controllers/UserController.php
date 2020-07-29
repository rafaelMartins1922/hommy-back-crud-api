<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Republic;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequest;
class UserController extends Controller
{
    /*
        Criar usuário
    */
    public function createUser(UserRequest $request){
        $user = new User;
        $user->createUser($request);
        return response()->json($user);
    }

    /*
        Buscar usuario por id
    */

    public function showUser($id){
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    /*
        Listar usuários
    */

    public function listUser(){
        $user = User::all();
        return response()->json($user);
    }

    /*
        Alterar usuário
    */

    public function updateUser(UserRequest $request,$id){
        $user = User::findOrFail($id);
        $user->updateUser($request);
        return response()->json($user);
    }
    
    /*
        Deletar usuário
    */
    public function deleteUser($id){
        User::destroy($id);
        return response()->json(["Usuário deletado."]);
    }

    /*
        Relacionar república com usuário (caso a relação 'usuário mora em república' seja implementada)
    */
    public function alugar($user_id,$republic_id){
        $user = User::findOrFail($user_id);
        $user-> alugar($republic_id);
        return response()->json($user);
    }

    public function desocupar($user_id){
        $user = User::findOrFail($user_id);
        $user-> desocupar();
        return response()->json("Um locatário deixou a república!");
    }

    public function anunciar($user_id,$republic_id){
        $republic = Republic::findOrFail($republic_id);
        $republic-> anunciar($user_id);
        return response()->json($republic);
    }

    public function favoritar($user_id,$republic_id){
        $user = User::findOrFail($user_id);
        $user->favoritas()->attach($republic_id);
        return response()->json('Adionada aos favoritos.');
    }

    public function favoritas($user_id){
        $user = User::findOrFail($user_id);
        $favoritas=$user->favoritas;
        return response()->json($favoritas);
    }

    public function buscaRepublicaAlugada($user_id){
        $user = User::findOrFail($user_id);
        $republic = $user->republic;
        return response()->json($republic);
    }

    /*
       Busca repúblicas anunciadas por um usuário
    */
    public function buscaRepublicasAnunciadas(){
        $user = User::findOrFail($user_id);
        $republic = $user->republics;
        return response()->json($user->buscaRepublicasAnunciadas);
    }

    public function buscaFavoritos($user_id){
        $user = User::findOrFail($user_id);
        $favoritas = $user->favoritas;
        return response()->json($favoritas);
    }
}
