<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Republic;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequest;
use App\Http\Resources\User as UserResource;
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
        return response()->json(new UserResource($user));
    }

    /*
        Listar usuários
    */

    public function listUser(){
        //$user = User::paginate(2); --exercicio eloquent2
        //return response()->json(UserResource::collection(User::all())); --exercicio eloquent2
        return response()->json(User::all());
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
        Relacionar república com usuário (caso a relação 'usuário aluga república' seja implementada)
    */
    public function alugar($user_id,$republic_id){
        $user = User::findOrFail($user_id);
        $user-> alugar($republic_id);
        return response()->json($user);
    }

    //Desassocia chave de república do usuário que antes vivia nela
    public function desocupar($user_id){
        $user = User::findOrFail($user_id);
        $user-> desocupar();
        return response()->json("Um locatário deixou a república!");
    }

    //Associa um usuário como anunciante de uma república
    public function anunciar($user_id,$republic_id){
        $republic = Republic::findOrFail($republic_id);
        $republic-> anunciar($user_id);
        return response()->json($republic);
    }

    //Cria relação de favoritos entre um usuário e uma república
    public function favoritar($user_id,$republic_id){
        $user = User::findOrFail($user_id);
        $republic = Republic::findOrFail($republic_id);
        $republic->userFavoritas()->attach($user_id);
        $user->favoritas()->attach($republic_id);
        return response()->json('Adionada aos favoritos.');
    }
    
    //Recupera as repúblicas favoritas de um usuário
    public function favoritas($user_id){
        $user = User::findOrFail($user_id);
        $favoritas=$user->favoritas;
        return response()->json($favoritas);
    }

    //Recupera a república em que o usuário vive
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

    //Estabelece o relacionamento entre usuário e comentário feito por eles
    public function fazComentario($user_id,$comment_id){
        $comment = Comment::findOrFail($comment_id);
        $comment->fazComentario($user_id);
        return response()->json($comment);
    }
}
