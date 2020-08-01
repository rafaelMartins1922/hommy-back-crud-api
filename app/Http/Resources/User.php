<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'email' =>$this->city,
            'CEP' =>$this->CEP,
            'phone' =>$this->phone,
            'birth_date' =>$this->birth_date,
            'complement' =>$this->complement,
            'description' =>$this->descritpion
        ];
    }
}
