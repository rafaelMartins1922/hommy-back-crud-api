<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Comment extends Model
{
    //Cria comentário
    public function createComment(Request $request){
        if($request->republic_id){
            $this->republic_id = $request->republic_id;
        }
        if($request->user_id){
            $this->user_id = $request->user_id;
        }
        if($request->evaluation){
            $this->evaluation = $request->evaluation;
        }
        if($request->content){
            $this->content = $request->content;
        }
        $this->save();
    }

    //Altera comentário
    public function updateComment(Request $request,$id){
        if($request->republic_id){
            $this->republic_id = $request->republic_id;
        }
        if($request->user_id){
            $this->user_id = $request->user_id;
        }
        if($request->content){
            $this->content = $request->content;
        }
        $this->save();
    }

    //Instancia a Model de Comentário que participa do relacionamento com usuário
    public function user(){
        return $this->belongsTo('App\User');
    }

    //Instancia a Model de Comentário que participa do relacionamento 'comentário refere-se a república'
    public function republic(){
        return $this->belongsTo('App\Republic');
    }

    //Preenche user_id de comentário  
    public function fazComentario($user_id){
        $this->user_id = $user_id;
        $this->save;
    }
    
    //Preenche republic_id de um comentário
    public function referesea($republic_id){
        $this->republic_id = $republic_id;
        $this->save();
    }
}
