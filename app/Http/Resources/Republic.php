<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Republic extends JsonResource
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
            'city' =>$this->city,
            'state' =>$this->state,
            'CEP' =>$this->CEP,
            'street' =>$this->street,
            'number' =>$this->number,
            'complement' =>$this->complement,
            'price' =>$this->price
        ];
    }
}
