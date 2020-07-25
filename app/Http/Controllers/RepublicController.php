<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Republic;
class RepublicController extends Controller
{
    public function createRepublic(Request $request){
        $republic = new Republic;
        $republic->name = $request->name;
        $republic->city = $request->city;
        $republic->state = $request->state;
        $republic->street = $request->street;
        $republic->number = $request->number;
        $republic->complement = $request->complement;
        $republic->price = $request->price;
        $republic->num_of_bedrooms = $request->num_of_bedrooms;
        $republic->dislikes = $request->dislikes;
        $republic->likes = $request->likes;
        $republic->type = $request->type;
        $republic->description = $request->description;
        $republic->pets = $request->pets;
        $republic->gender = $request->gender;
        $republic->condominium = $request->condominium;
        $republic->furniture = $request->furniture;
        $republic->wifi = $request->wifi;
        $republic->air_conditioner = $request->air_conditioner;
        $republic->water_heating = $request->water_heating;
        $republic->pool = $request->pool;
    
        $republic->save();
        return response()->json($republic);
    }

    public function showRepublic($id){
        $republic = Republic::findOrFail($id);
        return response()->json($republic);
    }

    public function listRepublic(){
        $republic = Republic::all();
        return response()->json([$republic]);
    }

    public function updateRepublic(Request $request,$id){
        $republic = Republic::findOrFail($id);
        if($request->name){
            $republic->name = $request->name;
        }
        if($request->city){
            $republic->city = $request->city;
        }
        if($request->state){
            $republic->state = $request->state;
        }
        if($request->street){
            $republic->street = $request->street;
        }
        if($request->number){
            $republic->number = $request->number;
        }
        if($request->complement){
            $republic->complement = $request->complement;
        }
        if($request->price){
            $republic->price = $request->price;
        }
        if($request->num_of_bedrooms){
            $republic->num_of_bedrooms = $request->num_of_bedrooms;
        }
        if($request->num_of_bathrooms){
            $republic->num_of_bathrooms = $request->num_of_bathrooms;
        }
        if($request->type){
            $republic->type = $request->type;
        }
        if($request->description){
            $republic->description = $request->description;
        }
        if($request->gender){
            $republic->gender = $request->gender;
        }
        if($request->pets){
            $republic->pets = $request->pets;
        }
        if($request->condominium){
            $republic->condominium = $request->condominium;
        }
        if($request->furniture){
            $republic->furniture = $request->furniture;
        }
        if($request->wifi){
            $republic->wifi = $request->wifi;
        }
        if($request->air_conditioner){
            $republic->air_conditioner = $request->air_conditioner;
        }
        if($request->water_heating){
           $republic->water_heating = $request->water_heating;
        }
        if($request->pool){
            $republic->pool = $request->pool;
        }
        $republic->save();
        return response()->json($republic);
    }

    public function deleteRepublic($id){
        Republic::destroy($id);
        return response()->json(["República deletada."]);
    }

    public function addUser($id, $user_id){
        $republic = Republic::findOrFail($id);
        $user = User::findOrFail($user_id);
        $republic->user_id = $user_id;
        $republic->save();
        return response()->json($republic);
    }

    public function removeUser($id,$user_id){
        $republic = Republic::findOrFail($id);
        $user = User::findOrFail($user_id);
        $republic->user_id = NULL;
        $republic->save;
        return response()->json($republic);
    }

}
