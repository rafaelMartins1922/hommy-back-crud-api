<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Republic;
use App\Http\Requests\UserRequest;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
        Criar usuário
    */
    public function createUser(UserRequest $request){
        $this->name = $request->name;
        $this->email = $request->email;
        $this->password = $request->password;
        $this->phone = $request->phone;
        $this->birth_date = $request->birth_date;
        $this->descricao = $request->descricao;

        $this->save();
    }

    /*
        Alterar usuário
    */
    public function updateUser(UserRequest $request){
        if($request->name){
            $this->name = $request->name;
        }
        if($request->email){
            $this->email = $request->email;
        }
        if($request->password){
            $this->password = $request->password;
        }
        if($request->phone){
            $this->phone = $request->phone;
        }
        if($request->date){
            $this->birth_date = $request->birth_date;
        }
        if($request->descricao){
            $this->descricao = $request->descricao;
        }
        $this->save();
    }
    
     /*
       Associar entidade República com Usuário (relação 'usuário aluga república')
    */
    public function republic(){
        return $this->belongsTo('App\Republic');
    }

    /*
       Associar entidade República com Usuário (relação 'usuário anuncia república')
    */
    public function republics(){
        return $this->hasMany('App\Republic');
    }

    /*
       Associar entidade República com Usuário (relação 'usuário favorita república')
    */
    public function favoritas(){
        return $this->belongsToMany('App\Republic');
    }      

     /*
       Associar chave de república com usuário (relação 'usuário gerencia república')
    */
    public function alugar($republic_id){
        $this->republic_id = $republic_id;
        $this->save();
    }

    public function desocupar(){
        $this->republic_id = NULL;
        $this->save();
    }

    public function favoritar($user_id,$republic_id){
        $user = User::findOrFail($user_id);
        $republic = Republic::findOrFail($republic_id);
        $user->favoritas()->attach($republic_id);
        $republic->userFavoritas()->attach($user_id);
    }
}
