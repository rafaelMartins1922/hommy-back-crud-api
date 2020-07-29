<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\User;

class UserRequest extends FormRequest
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
                'name' => 'required|string|alpha',
                'email' => 'required|email|Unique:Users,email',
                'password' => 'required',
                'phone' => 'required|telefone',
                'birth_date' => 'nullable|date_format:d/m/Y',
                'descricao' => 'nullable|string',
                'cpf' => 'formato_cpf',
                'cnpj' => 'cnpj'
            ];
        }
        if($this->isMethod('put')){
            return [
                'name' => 'string|alpha',
                'email' => 'email|Unique:Users,email',
                'password' => 'nullable',
                'phone' => 'telefone',
                'birth_date' => 'nullable|date_format:d/m/Y',
                'descricao' => 'nullable|string',
                'cpf' => 'formato_cpf',
                'cnpj' => 'cnpj'
            ];
        }
        if($this->isMethod('get')){}
        if($this->isMethod('delete')){}
    }

    // public function messages() {
    //     return [
    //         'name.required' => 'O campo nome é obrigatório.',
    //         'email.required' => "O campo e-mail é obrigatório",
    //         'email.email' => "Insira um e-mail válido",
    //         'email.Unique:Users,email' => 'Este e-mail já foi cadastrado.',
            
    //         'password.required' => 'O campo senha é obrigatório.',
    //         'phone.required' => 'O campo telefone é obrigatório.',
    //         'birth_date.date_format:d/m/Y' => "O formato da data é inválido"
    //     ];
    // }
}
