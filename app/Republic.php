<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Http\Requests\RepublicRequest;
use Illuminate\Support\Facades\Storage;

Use Illuminate\Database\Eloquent\SoftDeletes;
class Republic extends Model{
    //Implementa SoftDeletes
    use SoftDeletes;

    //Cria uma república
    public function createRepublic(RepublicRequest $request){
        $this->name = $request->name;
        $this->city = $request->city;
        $this->state = $request->state;
        $this->street = $request->street;
        $this->number = $request->number;
        $this->complement = $request->complement;
        $this->price = $request->price;
        $this->num_of_bedrooms = $request->num_of_bedrooms;
        $this->dislikes = $request->dislikes;
        $this->likes = $request->likes;
        $this->type = $request->type;
        $this->description = $request->description;
        $this->pets = $request->pets;
        $this->gender = $request->gender;
        $this->condominium = $request->condominium;
        $this->furniture = $request->furniture;
        $this->wifi = $request->wifi;
        $this->air_conditioner = $request->air_conditioner;
        $this->water_heating = $request->water_heating;
        $this->pool = $request->pool;
        if(!Storage::exists('localPhotos/')){
            Storage::makeDirectory('localPhotos/',0775,true);
        }
        if($request->file('photo')){
            $file= $request->file('photo');
          $filename=rand().'.'.$file->getClientOriginalExtension();
          $path=$file->storeAs("localPhotos/",$filename);
          $this->photo=$path;
        }
          
        //   $image = base64_decode($request->photo);
        //   $filename = uniqid();
        //   $path = 'localPhotos/'.$filename;
        //   file_put_contents(storage_path('app/'.$path),$image);
        //   $this->photo=$path;
        $this->save();
        return response()->json($this);
        $this->save();
    }

    /*
        Altera república
    */

    public function updateRepublic(RepublicRequest $request){
        if($request->name){
            $this->name = $request->name;
        }
        if($request->city){
            $this->city = $request->city;
        }
        if($request->state){
            $this->state = $request->state;
        }
        if($request->street){
            $this->street = $request->street;
        }
        if($request->number){
            $this->number = $request->number;
        }
        if($request->complement){
            $this->complement = $request->complement;
        }
        if($request->price){
            $this->price = $request->price;
        }
        if($request->num_of_bedrooms){
            $this->num_of_bedrooms = $request->num_of_bedrooms;
        }
        if($request->num_of_bathrooms){
            $this->num_of_bathrooms = $request->num_of_bathrooms;
        }
        if($request->type){
            $this->type = $request->type;
        }
        if($request->description){
            $this->description = $request->description;
        }
        if($request->gender){
            $this->gender = $request->gender;
        }
        if($request->pets){
            $this->pets = $request->pets;
        }
        if($request->condominium){
            $this->condominium = $request->condominium;
        }
        if($request->furniture){
            $this->furniture = $request->furniture;
        }
        if($request->wifi){
            $this->wifi = $request->wifi;
        }
        if($request->air_conditioner){
            $this->air_conditioner = $request->air_conditioner;
        }
        if($request->water_heating){
           $this->water_heating = $request->water_heating;
        }
        if($request->pool){
            $this->pool = $request->pool;
        }
        $this->save();
    }

    /*
       1-N Associar entidade República com Usuário (relação 'usuário vive em/aluga república')
    */
    public function userLocatario(){
        return $this->hasMany("App\User");
    }

    /*
       1-N Associar entidade República com Usuário (relação 'usuário anuncia/cria/gerencia república')
    */
    public function user(){
        return $this->belongsTo('App\User');
    }    

    /*
      N-N Associar entidade República com Usuário (relação 'usuário favorita república')
    */
    public function userFavoritas(){
        return $this->belongsToMany('App\User');
    }

    //Instancia a Model de Comentário que participa do relacionamento 'comentário refere-se a república'
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    //Seta user_id de República (id do locatário)
    public function anunciar($user_id){
        $user = User::findOrFail($user_id);
        $this->user_id = $user_id;
        $this->save();
    }
    
}
