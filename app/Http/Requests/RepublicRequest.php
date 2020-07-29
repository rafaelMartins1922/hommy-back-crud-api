<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Republic;

class RepublicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json($validator->errors(),
        422));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->isMethod('post')){
            return [
                'name' => 'string',
                'city' => 'string',
                'state' => 'string',
                'CEP' => 'nullable',
                'street' => 'string',
                'number' => 'numeric',
                'complement' => 'string',
                'price' => 'numeric',
                'num_of_bedrooms' => 'numeric',
                'num_of_bathrooms' => 'nullable|numeric',
                'dislikes' => 'nullable|numeric',
                'likes' => 'nullable|numeric',
                'type' => 'nullable|numeric',
                'description' => 'nullable|string',
                'pets' => 'nullable|boolean',
                'gender' => 'nullable|string',
                'condominium' => 'nullable|boolean',
                'funiture' => 'nullable|boolean',
                'wifi' => 'nullable|boolean',
                'air_conditioner' => 'nullable|boolean',
                'water_heating' => 'nullable|boolean',
                'pool' => 'nullable|boolean'
            ];
        }

        if($this->isMethod('put')){
            return [
                'name' => 'string',
                'city' => 'string',
                'state' => 'string',
                'CEP' => 'nullable',
                'street' => 'string',
                'number' => 'numeric',
                'complement' => 'string',
                'price' => 'numeric',
                'num_of_bedrooms' => 'numeric',
                'num_of_bathrooms' => 'nullable|numeric',
                'dislikes' => 'nullable|numeric',
                'likes' => 'nullable|numeric',
                'type' => 'nullable|numeric',
                'description' => 'nullable|string',
                'pets' => 'nullable|boolean',
                'gender' => 'nullable|string',
                'condominium' => 'nullable|boolean',
                'funiture' => 'nullable|boolean',
                'wifi' => 'nullable|boolean',
                'air_conditioner' => 'nullable|boolean',
                'water_heating' => 'nullable|boolean',
                'pool' => 'nullable|boolean'
            ];
        }
        
        if($this->isMethod('get')){
            return [];
        }
        
        if($this->isMethod('delete')){}
    }
}
