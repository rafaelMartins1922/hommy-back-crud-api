<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;
use App\Republic;

class CommentController extends Controller
{
    public function createComment(Request $request){
        $comment = new Comment;
        $comment->createComment($request);
        return response()->json($comment);
    }

    /*
        Buscar comentário por id
    */

    public function showComment($id){
        $comment = Comment::findOrFail($id);
        return response()->json($comment);
    }

    /*
        Listar comentários
    */

    public function listComment(){
        $comment = Comment::all();
        return response()->json($comment);
    }

    /*
        Alterar comentário
    */

    public function updateComment(UserRequest $request,$id){
        $comment = Comment::findOrFail($id);
        $comment->updateComment($request);
        return response()->json($comment);
    }
    
    /*
        Deletar comentário
    */
    public function deleteComment($id){
        Comment::destroy($id);
        return response()->json(["Comentário deletado."]);
    }

    //Recupera remente de um comentário
    public function remetente($id){
        $comment = Comment::findOrFail($id);
        return response()->json($comment->user);
    }

    //Recupera a república ao qual o comentário se refere
    public function referenciaRepublica($id){
        $comment = Comment::findOrFail($id);
        return response()->json($comment->republic);
    }
}
