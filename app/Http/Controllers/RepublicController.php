<?php
/*
    Controller de Repúblicas     
*/
namespace App\Http\Controllers;

use App\User;
use App\Republic;
use App\Comment;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RepublicRequest;
use App\Http\Resources\Republic as RepublicResource;

class RepublicController extends Controller


{
    /*
        Criar república
    */
    public function createRepublic(RepublicRequest $request){
        $republic = new Republic;
        $republic->createRepublic($request);
        return response()->json($republic);
    }

    /*
        buscar república por id
    */
    public function showRepublic($id){
        
        $republic = Republic::findOrFail($id);
        $s = new RepublicResource($republic);
        return response()->json($s);
    }

    /*
        Listar todas as repúblicas
    */

    public function listRepublic(RepublicRequest $request){
         $queryRepublic = Republic::query();
         if($request->likes){
             $queryRepublic->where('likes','>=',$request->likes);
         }
         if($request->price){
             $queryRepublic->where('price','>=',$request->price);
         }
         
         //EXERCICIO ELOQUENT II SLIDE 25
         $queryRepublic->has('comments','>=',2);
         $paginator = $queryRepublic->paginate(2);                      
         $republic = RepublicResource::collection($paginator);              
         $last = $paginator->lastPage();
         return response()->json([$paginator,$last]);
    }

    /*
        Alterar república
    */

    public function updateRepublic(RepublicRequest $request,$id){
        $republic = Republic::findOrFail($id);
        $republic->updateRepublic($request);
        return response()->json($republic);
    }

    /*
        Excluir república
    */
    public function deleteRepublic($id){
        Republic::destroy($id);
        return response()->json(["República deletada."]);
    }

    /* 1-1 Busca locatario da república (relação usuário anuncia república) */

    public function locatario($id){
        $republic = Republic::findOrFail($id);
        $locatarios = $republic->userLocatario;
        return response()->json($locatarios);
    }

    //Recupera o locador de uma república
    public function locador($id){
        $republic = Republic::findOrFail($id);
        return response()->json($republic->user);
    }

    //Recupera repúblicas deletadas quando SoftDeletes são usados
    public function getDeleted(){
        return response()->json(Republic::onlyTrashed()->get());
    }

    
    //Estabelece o relaciomento entre um comentário e a república ao qual ele se refere
    public function referenciaComentario($republic_id,$comment_id){
        $comment = Comment::findOrFail($id);
        $comment->referenciaComentario($republic_id);
        return response()->json($comment);
    }

    //ATIVIDADE ELOQUENT ii SLIDE 10
    //Exercício 1: Pegar todos os usuários com as repúblicas e comentários associados
        public function ex1_0(){
            return response()->json(User::with(['republics','comments'])); //usuários com suas reoúblicas e comentários de usuários
        }

        public function ex1_1(){
            return response()->json(User::with(['republics.comments']));//usuários com suas repúblicas e comentários de repúblicas
        }
    //Exercício 2: Pegar somente os usuários com repúblicas comentadas
        public function ex2(){
            return response()->json(Republic::with('user')->has('comments')->get());
        }
    //Exercício 3: Pegar somente as repúblicas com mais de 2 comentários
        public function ex3(){
            return response()->json(Republic::has('comments','>=',2)->get());
        }
}
